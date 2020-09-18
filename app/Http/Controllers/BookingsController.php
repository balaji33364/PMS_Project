<?php

namespace App\Http\Controllers;


use Illuminate\Http\Request;
use App\Booking;
use App\Post;
use App\User;
use DB;

class BookingsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function __construct()
    {
        $this->middleware('auth');
    }   
    public function index()
    {
        $data=Booking::all();
        return view('posts.CheckRequest')->with('data',$data);
        //$data=Booking::all();
        //'@foreach($data as $key)
        //echo "$key->id";
        //@endforeach
       //return view('posts.CheckRequest')->with('Booking',$data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
      
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store($id)
    {
    
        
        
        $data=Post::find($id);
        //$data=DB::select('select * from posts where id=?',[$id]);
        $booking=new Booking;
        $booking->admin_id=$data->user_id;
        $booking->customer_id=auth()->User()->id;
        $booking->room_name=$data->title;
        $booking->status='pending';
        $booking->save();
        return redirect('posts')->with('status','You have done booking successfully');

     
        
        /*$booking=new Booking;
        $booking->admin_id=$post->user_id;
        $booking->customer_id=auth()->user()->id; 
        $booking->room_name=$post->title;
        $booking->save();

        return redirect('view.index')->with('success','Room Booked');  */
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $data=Booking::all();
        $data1=Post::find($id);
        $data2=Booking::find($data1->user_id);
        $var1=User::find($data2->customer_id);
        $var2=User::find($data1->user_id);
        $staff=$var1->name;
        $custo=$var2->name;
        echo $name1;
        return view('posts.CheckRequest',compact('staff','custo'))->with('data',$data);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id,$flag)
    {
       if(auth()->User()->role == 'admin')
        {
            $var=Booking::find($id);
            $data=new Booking;
            $data->id=$id;
            $data->admin_id=auth()->user()->id;
            $data->customer_id=$var->customer_id;
            $data->room_name=$var->room_name;
            if($flag==1)
            {
                /*$var=Booking::find($id);
                $data=new Booking;
                $data->id=$id;
                $data->admin_id=auth()->user()->id;
                $data->customer_id=$var->customer_id;
                $data->room_name=$var->room_name;*/
                $data->status='Accept';
                DB::update('update bookings set admin_id=?,customer_id=?,room_name=?,status=? where id =?',[$data->admin_id,$data->customer_id,$data->room_name,$data->status,$id]);
            }
            else
            {
                /*$var=Booking::find($id);
                $data=new Booking;
                $data->id=$id;
                $data->admin_id=auth()->user()->id;
                $data->customer_id=$var->customer_id;
                $data->room_name=$var->room_name;*/
                $data->status='Decline';
                DB::update('update bookings set admin_id=?,customer_id=?,room_name=?,status=? where id =?',[$data->admin_id,$data->customer_id,$data->room_name,$data->status,$id]);
            }
            return redirect('/CheckRequest')->with('status','You have sent response successfully');
        }
        else
        {
            //$data=Booking::all();
            return redirect('/CheckRequest');
        }
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
