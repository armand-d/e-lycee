<?php

namespace App\Http\Controllers\Admin\Student;

use App\Http\Requests;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use Auth;

use \App\User;
use \App\Qcm;
use \App\Score;

class DashboardStudentController extends Controller
{

	public function __construct()
    {

    }

    public function index(){

        $user = User::findOrFail(Auth::user()->id);
        $qcms = Qcm::where('level', '=', Auth::user()->level)->where('status', '=', 1)->get();
        $scores = Score::where('user_id', '=', Auth::user()->id)->get();
        $scoreUser = 0;
        $i = 0;

        foreach ($scores as $key => $score) {
        	$scoreUser += $score->note;
        	$i++;
        }
 	
 		$average = $scoreUser/$i;

    	return view('back-office.student.pages.index')->with(array('user'=>$user, 'qcms'=>$qcms, 'scoreUser'=>$scoreUser, 'average'=>$average));
    }
}
