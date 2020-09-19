<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Booking extends Model
{
    //
    public $timestamps = true;
    protected $fillable=[
       'id',
       'admin_id',
       'customer_id',
       'room_name',
       'status',
        'created_at',
        'updated_at',
        'room_book'
   ];

    public function user(){
        return $this->belongsTo('App\User'); 
    }

    public function post(){
        return $this->hasMany('App\Post');
    }
}
