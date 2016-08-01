<?php

namespace App;

use Auth;

use Illuminate\Database\Eloquent\Model;

class Qcm extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'title', 'level', 'nbr_choice', 'nbr_question', 'status', 'user_id'
    ];

    public function getQuestions(){
    	return $this->hasMany('App\Question');
    }

    public function getScores(){
        return $this->hasOne('App\Score')->where('user_id','=', Auth::user()->id);
    }
}
