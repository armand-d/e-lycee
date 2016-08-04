<?php

namespace App\Http\Controllers;

use App\User;

use Input;
use Validator;
use Hash;
use Redirect;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Controllers\Controller;

class StudentController extends Controller
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
}
