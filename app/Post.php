<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    //
    public $timestamps = true;

   protected $fillable=[
       'id',
       'title',
       'body',
        'created_at',
        'updated_at',
        'user_id',
        'no_of_rooms',
        'no_of_staffs',
        'no_of_vacancies',
        'cover_image',
        'price'

        
   ];
   
    public function user(){
        return $this->belongsTo('App\User'); 
    }

    public function bookings(){
        return $this->hasMany('App\Booking');
    }
}
