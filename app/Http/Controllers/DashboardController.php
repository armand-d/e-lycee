<?php

namespace App\Http\Controllers;

use \App\Qcm;
use \App\Post;
use \App\User;

use Auth;
use Input;
use Redirect;

use \App\Http\Requests;
use \Illuminate\Http\Request;
use \App\Http\Controllers\Controller;

class DashboardController extends Controller
{

	public function __construct()
    {

    }

    public function showDashboardTeacher(){
    	$qcms = Qcm::where('user_id','=', Auth::user()->id)->get();
        $articles = Post::where('user_id','=', Auth::user()->id)->get();
        $students = User::where('role','=','student')->get();
        $user = User::findOrFail(Auth::user()->id);

    	return view('back-office.teacher.pages.dashboard')->with(array('qcms'=>$qcms,'articles'=>$articles,'students'=>$students, 'user'=>$user));
    }

    public function showProfilTeacher(){
        $user = User::findOrFail(Auth::user()->id);
        return view('back-office.teacher.pages.profile')->with(array('user'=>$user));
    }


}
