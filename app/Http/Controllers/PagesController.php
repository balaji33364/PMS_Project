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
}
