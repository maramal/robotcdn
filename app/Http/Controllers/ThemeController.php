<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Theme;
use Validator;
use Lang;

class ThemeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $themes = Theme::all();
        
        return view('themes.index', [ 'themes' => $themes ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('themes.create');
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
            'name' => 'required',
            'url' => 'required',
        ]);

        if($validator->fails())
        {
            return redirect('themes/create')
                ->with(['message' => [
                    'type' => 'danger',
                    'text' => 'Comprueba la informaci&oacute;n e intenta nuevamente.'
                ]
            ]);
        }

        $theme = new Theme;
        $theme->name = $request->name;
        $theme->url = $request->url;
        
        try
        {
            $theme->save();
        }
        catch(\Exception $e)
        {
            return redirect('themes/create')
                ->with(['message' => [
                    'type' => 'danger',
                    'text' => 'No se pudo guardar el tema. El servidor respondi&oacute;: ' . $e->getMessage()
                ]
            ]);
        }

        return redirect('themes')
            ->with(['message' => [
                'type' => 'success',
                'text' => 'El tema se ha guardado correctamente.'
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
        $theme = Theme::find($id);

        if(!$theme) return view('error.404');

        return view('themes.edit', [ 'theme' => $theme ]);
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
            'number' => 'required',
            'url' => 'required',
        ]);

        if($validator->fails())
        {
            return redirect('themes/' . $id . '/edit')
                ->with(['message' => [
                    'type' => 'danger',
                    'text' => 'Comprueba la informaci&oacute;n e intenta nuevamente.'
                ]
            ]);
        }

        $theme = Theme::find($id);

        if(!$theme)
        {
            return back()
                ->with(['message' => [
                    'type' => 'success',
                    'text' => 'No se encontr&oacute; el tema.'
                ]
            ]);
        }

        if($theme->name !== $request->name)
            $theme->name = $request->name;
        if($theme->url !== $request->url)
            $theme->url = $request->url;

        try
        {
            $theme->save();
        }
        catch(\Exception $e)
        {
            return redirect('themes/' . $id . '/edit')
                ->with(['message' => [
                    'type' => 'danger',
                    'text' => 'No se pudo modificar el tema. El servidor respondi&oacute;: ' . $e->getMessage()
                ]
            ]);
        }

        return redirect('themes/' . $id . '/edit')
            ->with(['message' => [
                'type' => 'success',
                'text' => 'El tema ha sido modificado con &eacute;xito.'
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
        $theme = Theme::find($id);
        
        if(!$theme)
            return view('error.404');

        try
        {
            $theme->delete();
        }
        catch(\Exception $e)
        {
            return back()
                ->with(['message' => [
                    'type' => 'danger',
                    'text' => 'No se pudo eliminar el tema. El servidor respondi&oacute;: ' . $e->getMessage()
                ]
            ]);
        }
        return redirect('themes')
            ->with(['message' => [
                    'type' => 'success',
                    'text' => 'Tema eliminado con &eacute;xito.'
            ]
        ]);
    }
    
    public function use($id)
    {
        $theme = Theme::find($id);
        
        if(!$theme)
            return view('error.404');
            
        $already_used = Theme::where('used', true)->get();
        foreach($already_used as $used)
        {
            $used->used = false;
            $used->save();
        }
            
        $theme->used = true;

        try
        {
            $theme->save();
        }
        catch(\Exception $e)
        {
            return back()
                ->with(['message' => [
                    'type' => 'danger',
                    'text' => 'No se pudo seleccionar el tema. El servidor respondi&oacute;: ' . $e->getMessage()
                ]
            ]);
        }
        return redirect('themes')
            ->with(['message' => [
                    'type' => 'success',
                    'text' => 'Tema seleccionado con &eacute;xito.'
            ]
        ]);
    }
}
