<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Score extends Model
{
        /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'qcm_id', 'status_qcm', 'note', 'user_id'
    ];

    public function qcm (){
    	return $this->belongsTo('App\Qcm');
    }
}
