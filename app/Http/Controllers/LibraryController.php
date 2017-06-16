<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\CDN;

class LibraryController extends Controller
{
    public function url($id)
    {
        $cdn = CDN::findOrFail($id);
        
        return response()->json($cdn);
    }
    
    public function getContent($name)
    {
        $cdn = CDN::where('file_name', $name)->first();
        
        if(!$cdn) return null;
        
        $content = file_get_contents($cdn->url);
        
        if($cdn->file_type)
        {
            if($cdn->file_type === 'css')
            {
                $mime = 'text/css';
            }
            else
            {
                $mime = 'text/javascript';
            }
        }
        
        $response = \Response::make($content);
        $response->header('Content-Type', $mime);
        return $response;
    }
}
