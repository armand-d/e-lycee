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

    public function index() {

        $students = User::where('role','=','student')->get();

        return view('back-office.teacher.pages.student.index')->with(array('students'=> $students));
    }

    public function create(Request $request){

        if (!Input::get('student_create')) {
            return view('back-office.teacher.pages.student.create');
        }

        $validator = Validator::make($request->all(), [
            'username'         => 'required|string|unique:users',
            'level'       => 'required'
        ]);

        if ($validator->fails()) {
            return redirect('professeur/eleve/create')->withErrors($validator)->withInput()->with('alert-danger','Merci de vérifier le formulaire');
        }

        $user = User::create($request->all());
        $user->password = Hash::make(Input::get('username'));
        $user->level = Input::get('level');
        $user->save();

        return Redirect::to('professeur/eleve')->with('alert-success','L\'élève a bien était ajouté');
    }

    public function destroy($id) {
        User::where('id', '=', $id)->delete();
        return Redirect::to('professeur/eleve')->with('alert-success','L\'élève a bien était supprimé');
    }

    public function updateUser(Request $request){

        $validator = Validator::make($request->all(), [
            'username'         => 'required|string|unique:users',
        ]);

        if (Auth::user()->role == 'teacher')
            $role = 'professeur';
        else
            $role = 'etudiant';

        if ($validator->fails()) {
            return redirect($role.'#profil')->withErrors($validator)->withInput();
        }

        $user = User::FindOrFail(Auth::user()->id);
        $user->username = Input::get('username');
        $user->save();

        return Redirect::to($role.'/profil');
    }

    public function deletePhoto(){
        $user = User::FindOrFail(Auth::user()->id);
        $user->url_avatar = url('assets/images/avatar.png');
        $user->save();

        if (Auth::user()->role == 'teacher')
            $role = 'professeur';
        else
            $role = 'etudiant';

        return Redirect::to($role.'/profil');
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
}
