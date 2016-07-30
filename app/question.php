<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Question extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'qcm_id', 'title', 'response'
    ];

    public function getChoices(){
    	return $this->hasMany('App\Choice');
    }
}
