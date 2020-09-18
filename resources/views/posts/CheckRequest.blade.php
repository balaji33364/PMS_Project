@extends('layouts.app')
@section('content')
@if(!Auth::guest())
@if(auth()->user()->role=='customer')
{{$flag=false}}
  <h2><u>Customer request status:-</u></h2><br>
   @if(count($data)>0)
   @foreach($data as $post)  
       <div class="well">
        <div class="row">
                <div class="col-md-8 col sm-4">
                  @if(auth()->user()->id == $post->customer_id) 
                  <h3>Booking for the room in {{$post->room_name}} is {{$post->status}}</h3>
                           <hr>
                      <br>
                    <div style="display:none">{{$flag = true}}</div>
                  @endif
                </div>
          </div>
       </div>
  @endforeach
  @endif
  @if($flag=='true')
  @else
    <p><h4 >You have not requested for any room booking</h4></p>
  @endif
@else
   {{$flag=false}}
  <h2><u>Admin sending Response to customer:-></u></h2><br>
  @if (session('status'))
    <div class="alert alert-success">
        {{ session('status') }}
    </div>
  @endif
  @if(count($data)>0)
  @foreach($data as $post)  
       <div class="well">
        <div class="row">
                <div class="col-md-8 col sm-4">
                  @if(auth()->user()->id ==  $post->admin_id )
                        @if( $post->status == 'Accept'|| $post->status == 'Decline' )
                        
                        @else
                          <h3>There is room booking request in your {{$post->room_name}} hotel</h3>
                          <a href="tk/{{$post->id}}/{{1}}"><button class="btn btn-primary" type="submit">Accept</button></a>
                          <a href="tk/{{$post->id}}/{{0}}"><button class="btn btn-primary" type="submit">Decline</button></a>
                          <hr>
                          <br>
                          <div style="display:none">{{$flag = true}}</div>
                        @endif
                 </div>
                @endif
        </div>
       </div>
  @endforeach
  @endif
  @if($flag=='true')
  @else
  <h3>No booking request found</h3>
  @endif
@endif
@endif
@endsection