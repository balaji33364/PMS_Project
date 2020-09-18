@extends('layouts.app')
@section('content')
<a href='/posts' class="btn btn-secondary">Go Back</a>
<h1>{{$post->title}}</h1>
<h1>{{$post->body}}</h1>

<img style="width:50%" src="/storage/cover_images/{{$post->cover_image}}">
<br><br>

<hr>
@if(!Auth::guest())
    @if(Auth::user()->id == $post->user_id)
        <a href='/posts/{{$post->id}}/edit' button type="button" class="btn btn-primary "> Edit </a>
        {!!Form::open(['action' => ['PostController@destroy',$post->id],'method' => 'POST', 'class' => 'pull-right'])!!}
        {{Form::hidden('_method','DELETE')}}
        {{Form::submit('Delete',['class'=> 'btn btn-danger'])}}
        {!!Form::close()!!}
    @endif
@endif

@endsection