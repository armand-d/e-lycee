<?php

namespace App;

use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'username', 'role', 'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    public function isTeacherAdmin()
    {
        if (!empty($this->role) && $this->role == 'teacher') {
            return $this->role;
        }
        return false;
    }

    public function isStudentAdmin()
    {
        if (!empty($this->role) && $this->role == 'first_class' || $this->role == 'final_class') {
            return $this->role;
        }
        return false;
    }


}
