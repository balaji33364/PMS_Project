@extends('layouts.app')
@section('content')
<a href='/posts' class="btn btn-secondary">Go Back</a>
<div class="well">


    <h1>Edit Posts</h1>


</div>
{!! Form::open(['action' => ['PostController@update',$post->id], 'method' => 'POST','enctype' =>'multipart/form-data']) !!}
<div class="form-group">
    {{form::label('','Property Name')}}
    {{form::text('title',$post->title,['class'=> 'form-control', 'placeholder' => 'Enter your Property Name'])}}
</div>

<div class="form-group">
    {{form::label('','Location')}}
    {{form::text('body',$post->body,['class'=> 'form-control', 'placeholder' => 'Enter the Location of the Property'])}}
</div>

<div class="form-group">
    {{form::label('','Number of Rooms')}}
    {{form::number('no_of_rooms',$post->no_of_rooms,['class'=> 'form-control', 'placeholder' => 'Enter Number of rooms'])}}
</div>

<div class="form-group">
    {{form::label('','Price')}}
    {{form::number('price',$post->price,['class'=> 'form-control', 'placeholder' => 'Enter Number of rooms'])}}
</div>

<div class="form-group">
    {{form::label('','Number of Staffs')}}
    {{form::number('no_of_staffs',$post->no_of_staffs,['class'=> 'form-control', 'placeholder' => 'Enter number of staffs'])}}
</div>

<div class="form-group">
    {{form::label('','Number of Vacancies')}}
    {{form::number('no_of_vacancies',$post->no_of_vacancies,['class'=> 'form-control', 'placeholder' => 'Enter number of vacancies'])}}
</div>

<div class="form-group">
   {{form::file('cover_image')}} 

</div>




{{form::hidden('_method','PUT')}}
{{form::submit('Submit',['class' => 'btn btn-primary '])}}
{!! Form::close() !!}

@endsection