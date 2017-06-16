<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\CDN;
use Auth;

class WebController extends Controller
{
    public function index() 
    {
        $cdns = CDN::all();
        $cdns = [ 'cdns' => $cdns ];
        
        return view('web.index', $cdns);
    }
    
    public function logout()
    {
        if(Auth::check())
        {
            Auth::logout();
            return redirect('/')->with([
                'type' => 'success',
                'text' => 'Hasta luego.'
            ]);
        }
    }
}
