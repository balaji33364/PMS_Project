@extends('layouts.app')
@section('content')
<div class="well">
<h1>Create Posts</h1>
</div>
        {!! Form::open(['action' => 'PostController@store', 'method' => 'POST','enctype' =>'multipart/form-data']) !!}
        <div class="form-group">
            {{form::label('','Property Name')}}
            {{form::text('title','',['class'=> 'form-control', 'placeholder' => 'Enter your property Name'])}}
        </div>

        <div class="form-group">
            {{form::label('','Location')}}
            {{form::text('body','',['class'=> 'form-control', 'placeholder' => 'Enter the location of the Property'])}}
        </div>

        <div class="form-group">
            {{form::label('','Number of Rooms')}}
            {{form::number('no_of_rooms','',['class'=> 'form-control', 'placeholder' => 'Enter Number of rooms'])}}
        </div>


        <div class="form-group">
            {{form::label('','Price')}}
            {{form::number('price','',['class'=> 'form-control', 'placeholder' => 'Price'])}}
        </div>

        <div class="form-group">
            {{form::label('','Number of Staffs')}}
            {{form::number('no_of_staffs','',['class'=> 'form-control', 'placeholder' => 'Enter number of staffs'])}}
        </div>

        <div class="form-group">
            {{form::label('','Number of Vacancies')}}
            {{form::number('no_of_vacancies','',['class'=> 'form-control', 'placeholder' => 'Enter number of vacancies'])}}
        </div>

        <div class="form-group">
        {{form::file('cover_image')}} 
        </div>

        {{form::submit('Submit',['class' => 'btn btn-primary'])}}
        {!! Form::close() !!}


@endsection