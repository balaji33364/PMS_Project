@extends('layouts.app')
@section('content')
@if(auth()->user()->role=='customer')
{{$flag=false}}
  <h2><u>Customer request status:-</u></h2><br>
   @if(count($data)>0)
   @foreach($data as $post)  
       <div class="well">
        <div class="row">
                <div class="col-md-8 col sm-4">
                  @if(auth()->user()->id == $post->customer_id) 
                    @if($post->status=='Accept')
                        <div class="alert alert-success" style="font-size: 1.6rem;">
                        {{$post->admin_name}} had accepted your booking request for {{$post->room_book}} rooms in his Hotel.
                        </div>
                    @endif
                    @if($post->status=='Decline')
                        <div class="alert alert-danger" style="font-size: 1.6rem;">
                        {{$post->admin_name}} had rejected your booking request for {{$post->room_book}} rooms in his Hotel.
                        </div>
                    @endif
                    @if($post->status=='pending')
                        <div class="alert alert-primary" style="font-size: 1.6rem;">
                         your booking request for {{$post->room_book}} rooms in {{$post->room_name}} Hotel is Pending.
                        </div>
                    @endif
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
    <div class="alert alert-success" style="font-size: 1.6rem;">
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
                          <h3>{{$post->customer_name}} wants to book {{$post->room_book}} rooms in your Hotel.</h3>
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
@endsection