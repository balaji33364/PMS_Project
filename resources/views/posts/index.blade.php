@extends('layouts.app')
@section('content')
<h1>Posts</h1>
@if (session('status'))
    <div class="alert alert-success">
        {{ session('status') }}
    </div>
@endif
@if(count($posts)>0)
@foreach($posts as $post)  
       <div class="well">
        <div class="row">
                <div class="col-md-4 col sm-4">
                        <img style="width:100%" src="/storage/cover_images/{{$post->cover_image}}">
                       <br><hr><hr>
                        <hr>
                </div>

                <div class="col-md-8 col sm-4">
                        <h3><a href='/posts/{{$post->id}}'>{{$post->title}}</a></h3>
                        <h2>Rooms: {{$post->no_of_rooms}}</h2>
                        <h2>Price: {{$post->price}} Rs</h2>
                        <h2>Location: {{$post->body}}</h2>
                        <h2>Staffs: {{$post->no_of_staffs}}</h2>
                        <h2>Vacancy: {{$post->no_of_vacancies}}</h2>
                        @if(!Auth::guest())
                                        @if(auth()->user()->role=='customer')
                                                <a href="index/{{$post->id}}"><button type="button" class="btn btn-primary">Book</button></a>
                                        @endif
                        @endif
                           <hr>
                        <br>
                </div>

        </div>
        
       </div>

@endforeach

@else
<p> No  Posts Found</p>
@endif
@endsection