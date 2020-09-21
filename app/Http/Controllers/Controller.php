<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;

class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    public function save(Request $request)
    {
        $URL=$request->input('url');
        $Output_File=$request->input('output_file');

        $filenameWithExt=$request->file('cover_image')->getClientOriginalName();
        $filename =  pathinfo($filenameWithExt, PATHINFO_FILENAME);
        $extension = $request->file('cover_image')->getClientOriginalExtension();

        $fileNameToStore=$filename.'.'.$extension;
        $path= $request->file('cover_image')->storeAs('public/cover_images',$fileNameToStore);

        return  view('qrcode.qrcontent') ->with('URL',$URL)->with('Output_File',$Output_File)->with('fileNameToStore',$fileNameToStore);
                              
    }
}
