<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Post;
use App\User;
use DB;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
   
    public function __construct()
    {
        $this->middleware('auth', ['except' => ['index','show']]);
    }   

    
   
   
   
     public function index()
    {
        $posts= post::all();
        //$posts=DB::select('select * from posts')
       return view('posts.index')->with('posts',$posts);
      
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        if(auth()->user()->role == 'admin')
        {
            return view('posts.create');
        }

        return redirect('/posts')->with('error','Unauthorized Page');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'title' => 'required',
            'body' => 'required',
            'no_of_rooms' => 'required',
            'no_of_staffs' => 'required',
            'no_of_vacancies' => 'required',
            'cover_image' => 'image|nullable|max:1999',
            'price' => 'required'

        ]);


        if($request->hasFile('cover_image'))
        {
            $filenameWithExt=$request->file('cover_image')->getClientOriginalName();
            $filename =  pathinfo($filenameWithExt, PATHINFO_FILENAME);
            $extension = $request->file('cover_image')->getClientOriginalExtension();

            $fileNameToStore=$filename.'_'.time().'.'.$extension;
            $path= $request->file('cover_image')->storeAs('public/cover_images',$fileNameToStore);
        }
        else{
            $fileNameToStore='noimage.jpg';
        }
       

        
        $post=new Post;
        $post->title=$request->input('title');
        $post->body=$request->input('body');
        $post->no_of_rooms=$request->input('no_of_rooms');
        $post->no_of_staffs=$request->input('no_of_staffs');
        $post->no_of_vacancies=$request->input('no_of_vacancies');
        $post->cover_image=$fileNameToStore;
        $post->user_id=auth()->user()->id; 
        $post->price=$request->input('price');
        $post->save(); 
        
        return redirect('/posts')->with('success','Post Created'); 
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $post=Post::find($id);
        return view('posts.show')->with('post',$post);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $post=Post::find($id);
        if(auth()->user()->id !== $post->user_id){
            return redirect('/posts')->with('error','unauthorized page');
        }

        return view('posts.edit')->with('post',$post);
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
        $this->validate($request, [
            'title' => 'required',
            'body' => 'required'
        ]);
       
        

        if($request->hasFile('cover_image'))
        {
            $filenameWithExt=$request->file('cover_image')->getClientOriginalName();
            $filename =  pathinfo($filenameWithExt, PATHINFO_FILENAME);
            $extension = $request->file('cover_image')->getClientOriginalExtension();
            $fileNameToStore=$filename.'_'.time().'.'.$extension;
            $path= $request->file('cover_image')->storeAs('public/cover_images',$fileNameToStore);
        }
       
        
        $post=Post::find($id);
        $post->title=$request->input('title');
        $post->body=$request->input('body');
        $post->no_of_rooms=$request->input('no_of_rooms');
        $post->no_of_staffs=$request->input('no_of_staffs');
        $post->price=$request->input('price');
        $post->no_of_vacancies=$request->input('no_of_vacancies');
        if($request->hasFile('cover_image'))
        {
            $post->cover_image=$fileNameToStore;
        }
        
        $post->save(); 
        
        return redirect('/posts')->with('success','Post Updated'); 
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $post=Post::find($id);
        if(auth()->user()->id !== $post->user_id){
            return redirect('/posts')->with('error','unauthorized page');
        }

       /* if($post->cover_image != 'noimage.jpg')
        {
            Storage::delete('public/cover_images/'.$post->cover_image);
        } */
        
        $post->delete();
        return redirect('/posts')->with('success','Post Removed'); 

    }
}
