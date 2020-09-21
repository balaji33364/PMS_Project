<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PagesController extends Controller
{
    public function index()
    {
        return view('index');
    }

    

    public  function about()
    {
        return  view('about');
    }

    public function  services()
    {
        $data= array(
            'title' => 'services',
            'services'=> ['Wifi','Hygiene Washroom','Air Conditioning','BreakFast']
        );
        return view('services')->with($data);
    }

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
