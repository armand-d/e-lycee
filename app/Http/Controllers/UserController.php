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

    public function updateTeacher(Request $request){

        $validator = Validator::make($request->all(), [
            'username'         => 'required|string|unique:users',
        ]);

        if ($validator->fails()) {
            return redirect('professeur#profil')->withErrors($validator)->withInput();
        }

        $user = User::FindOrFail(Auth::user()->id);
        $user->username = Input::get('username');
        $user->save();

        return Redirect::to('professeur#profil');
    }

    public function deletePhoto(){
        $user = User::FindOrFail(Auth::user()->id);
        $user->url_avatar = url('assets/images/avatar.png');
        $user->save();

        return Redirect::to('professeur#profil');
    }

    public function replacePhoto(Request $request){

        $destinationPath = 'assets/images/uploads/';
        $extension = Input::file('avatar')->getClientOriginalExtension();
        $fileName = rand(11111,99999).'.'.$extension;
        Input::file('avatar')->move($destinationPath, $fileName);

        $user = User::FindOrFail(Auth::user()->id);
        $user->url_avatar = url('assets/images/uploads/'.$fileName);
        $user->save();

        return response()->json(['avatar' => url('assets/images/uploads/'.$fileName)]);

    }

    public function destroy($id) {
        User::where('id', '=', $id)->delete();
        return Redirect::to('professeur#eleves');
    }
}
