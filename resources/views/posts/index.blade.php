@extends('layouts.app')
@section('content')
<h1>Posts</h1>
 @error('room_number')
  <div class="alert alert-danger" style="font-size: 1.6rem;">{{ $message }}</div>
  @enderror
  <div class='container'>
    @include('inc.message')
    
</div>
@if(session('roomnumber1'))
    @if (session('status'))
   <div class="alert alert-success" style="font-size: 1.6rem;">
   {{ session ('roomnumber1') }} {{ session('status') }}
   </div>
    @endif
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
                                            {!! Form::open(['action' => 'BookingsController@store' , 'method' => 'POST','enctype' =>'multipart/form-data']) !!}
                                            <div class="form-group" style="font-size: 1.6rem;">
                                            {{form::label('','No.of room you want to book')}}
                                            {{form::text('room_number','',['class'=> 'form-control', 'placeholder' => 'No .of rooms'])}}
                                            {{ Form::hidden('id',$post->id)}}

                                            @if(session('var')==$post->id)
                                            @if(session('roomnumber'))
                                                @if (session('status1'))
                                               <div class="alert alert-danger" style="font-size: 1.6rem;">
                                               {{ session ('roomnumber') }} {{ session('status1') }}
                                               </div>
                                                @endif
                                            @endif
                                            @endif
                                            {{form::submit('Book',['class' => 'btn btn-primary'])}}
                                            {!! Form::close() !!}
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