<?php

namespace App\Http\Controllers\Admin\Student;

use App\Http\Requests;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use Auth;

use \App\User;
use \App\Qcm;

class DashboardStudentController extends Controller
{

	public function __construct()
    {

    }

    public function index(){

        $user = User::findOrFail(Auth::user()->id);
        $qcms = Qcm::where('level', '=', Auth::user()->level)->get();

    	return view('back-office.student.pages.index')->with(array('user'=>$user, 'qcms'=>$qcms));
    }
}
