<?php

namespace App;

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

}
