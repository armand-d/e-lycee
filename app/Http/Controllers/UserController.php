<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Redirect;
use Validator;
use Input;
use Auth;
use Hash;

use App\User;

use App\Http\Requests;
use App\Http\Controllers\Controller;

class UserController extends Controller
{
    public function store(Request $request) {

        $validator = Validator::make($request->all(), [
            'username'         => 'required|string|unique:users',
			'level'       => 'required'
        ]);

        if ($validator->fails()) {
            return redirect('professeur#ajouter-eleve')->withErrors($validator)->withInput();
        }

        $user = User::create($request->all());
        $user->password = Hash::make(Input::get('username'));
        $user->level = Input::get('level');
        $user->save();

    	return Redirect::to('professeur#eleves');
    }
}
