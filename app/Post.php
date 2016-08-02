<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'user_id','title', 'content', 'url_thumbnail', 'status'
    ];

    public function user (){
    	return $this->belongsTo('App\User');
    }

    public function comments(){
        return $this->hasMany('App\Comment')->where('status','=',1)->orderBy('created_at', 'desc');
    }
}
