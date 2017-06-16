<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\CDN;
use Validator;
use Lang;

class CDNController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $cdns = CDN::all();
        
        return view('cdn.index', [ 'cdns' => $cdns ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('cdn.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'file_name' => 'required|unique:cdns'
        ]);

        if($validator->fails())
        {
            return redirect('cdn/create')
                ->with(['message' => [
                    'type' => 'danger',
                    'text' => Lang::get('CDNController.storeValidatorFails')
                ]
            ])->withInput();
        }

        $cdn = new CDN;
        $cdn->file_name = $request->file_name;
        $cdn->file_type = $request->file_type;
        $cdn->url = $request->url;
        $cdn->current_version = $request->current_version;
        $cdn->created_by_user_id = \Auth::user()->id;
        
        try
        {
            $cdn->save();
        }
        catch(\Exception $e)
        {
            return redirect('cdn/create')
                ->with(['message' => [
                    'type' => 'danger',
                    'text' => Lang::get('CDNController.storeException') . $e->getMessage()
                ]
            ])->withInput();
        }

        return redirect('cdn')
            ->with(['message' => [
                'type' => 'success',
                'text' => Lang::get('CDNController.storeSuccess')
            ]
        ]);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        return view('error.404');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $cdn = CDN::find($id);

        if(!$cdn) return view('error.404');

        return view('cdn.edit', [ 'cdn' => $cdn ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $validator = Validator::make($request->all(), [
            'file_name' => 'required',
        ]);

        if($validator->fails())
        {
            return redirect('cdn/' . $id . '/edit')
                ->with(['message' => [
                    'type' => 'danger',
                    'text' => Lang::get('CDNController.updateValidatorFails')
                ]
            ]);
        }

        $cdn = CDN::find($id);

        if(!$cdn)
        {
            return back()
                ->with(['message' => [
                    'type' => 'danger',
                    'text' => Lang::get('CDNController.updateNotFound')
                ]
            ]);
        }
        
        if($cdn->file_name !== $request->file_name)
            $cdn->file_name = $request->file_name;
        if($cdn->file_type !== $request->file_type)
            $cdn->file_type = $request->file_type;
        if($cdn->url !== $request->url)
            $cdn->url = $request->url;
        if($cdn->current_version !== $request->current_version)
            $cdn->current_version = $request->current_version;

        try
        {
            $cdn->save();
        }
        catch(\Exception $e)
        {
            return redirect('cdn/' . $id . '/edit')
                ->with(['message' => [
                    'type' => 'danger',
                    'text' => Lang::get('CDNController.updateException') . $e->getMessage()
                ]
            ]);
        }

        return redirect('cdn/' . $id . '/edit')
            ->with(['message' => [
                'type' => 'success',
                'text' => Lang::get('CDNController.updateSuccess')
            ]
        ]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $cdn = CDN::find($id);
        
        if(!$cdn)
            return view('error.404');

        try
        {
            $cdn->delete();
        }
        catch(\Exception $e)
        {
            return back()
                ->with(['message' => [
                    'type' => 'danger',
                    'text' => Lang::get('CDNController.destroyException') . $e->getMessage()
                ]
            ]);
        }
        return redirect('cdn')
            ->with(['message' => [
                    'type' => 'success',
                    'text' => Lang::get('CDNController.destroySuccess')
            ]
        ]);
    }
    
    
}
