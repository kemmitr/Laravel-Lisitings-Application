<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Listing extends Model
{
    public function user(){
        return $this->belongsTo('App\User');
    }

    public function commentsreal(){
        $this->hasMany('App\Commentreal');
        //below does the same thing as above
//        $this->hasMany(Comment::class);
    }



}
