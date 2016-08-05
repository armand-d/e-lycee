<?php

namespace App\Http\Controllers;

use \App\Qcm;
use \App\Post;
use \App\User;
use \App\Score;
use \App\Comment;

use Auth;
use Input;
use Redirect;

use \App\Http\Requests;
use \Illuminate\Http\Request;
use \App\Http\Controllers\Controller;

class DashboardController extends Controller
{

    public function showDashboardTeacher(){
        $qcms = Qcm::where('user_id','=', Auth::user()->id)->get();
    	$qcmsLimit = Qcm::where('user_id','=', Auth::user()->id)->limit(3)->get();
        $articles = Post::where('user_id','=', Auth::user()->id)->get();
        $articlesLimit = Post::where('user_id','=', Auth::user()->id)->limit(2)->get();
        $students = User::where('role','=','student')->get();
        $user = User::findOrFail(Auth::user()->id);

    	return view('back-office.teacher.pages.dashboard')->with(array('qcmsLimit'=>$qcmsLimit,'articlesLimit'=>$articlesLimit,'qcms'=>$qcms,'articles'=>$articles,'students'=>$students, 'user'=>$user));
    }

    public function showDashboardStudent(){

        $user = User::findOrFail(Auth::user()->id);
        $qcms = Qcm::where('level', '=', Auth::user()->level)->where('status', '=', 1)->get();
        $scores = Score::where('user_id', '=', Auth::user()->id)->get();
        $comments = Comment::where('user_id', '=', Auth::user()->id)->orderBy('created_at', 'desc')->get();
        $scoreUser = 0;
        $i = 0;
        $average = 0;
        
        foreach ($scores as $key => $score) {
            $scoreUser += ($score->note/$score->qcm->nbr_question)*20; // note /20
            $i++;
        }

        if ($scoreUser) {
            $average = $scoreUser/$i;
        }

        return view('back-office.student.pages.dashboard')->with(array('scores'=>$scores,'comments'=>$comments,'user'=>$user, 'qcms'=>$qcms, 'scoreUser'=>$scoreUser, 'average'=>$average));

    }

    public function showProfilTeacher(){
        $user = User::findOrFail(Auth::user()->id);
        return view('back-office.teacher.pages.profile')->with(array('user'=>$user));
    }

    public function showProfilStudent(){
        $user = User::findOrFail(Auth::user()->id);
        return view('back-office.student.pages.profile')->with(array('user'=>$user));
    }


}
