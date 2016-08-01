<?php

namespace App\Http\Controllers\Admin\Teacher;

use \App\Qcm;
use \App\Question;
use \App\Choice;
use \App\Post;
use \App\User;

use Auth;
use Input;
use Redirect;

use \App\Http\Requests;
use \Illuminate\Http\Request;
use \App\Http\Controllers\Controller;

class DashboardTeacherController extends Controller
{

	public function __construct()
    {

    }

    public function index(){
    	$qcmsAll = Qcm::where('user_id','=', Auth::user()->id)->get();
    	$qcmsPublish = Qcm::where('user_id','=', Auth::user()->id)->where('status','=',1)->get();
    	$qcmsUnpublish = Qcm::where('user_id','=', Auth::user()->id)->where('status','=',0)->get();
    	$qcmsDelete = Qcm::where('user_id','=', Auth::user()->id)->where('status','=',2)->get();
        $articlesAll = Post::where('user_id','=', Auth::user()->id)->get();
        $articlesPublish = Post::where('user_id','=', Auth::user()->id)->where('status','=',1)->get();
        $articlesUnpublish = Post::where('user_id','=', Auth::user()->id)->where('status','=',0)->get();
        $articlesDelete = Post::where('user_id','=', Auth::user()->id)->where('status','=',2)->get();
        $students = User::where('role','=','student')->get();
        $user = User::findOrFail(Auth::user()->id);

    	return view('back-office.teacher.pages.index')->with(array('qcmsAll'=>$qcmsAll, 'qcmsPublish'=>$qcmsPublish, 'qcmsUnpublish'=>$qcmsUnpublish, 'qcmsDelete'=>$qcmsDelete, 'articlesAll'=>$articlesAll, 'articlesPublish'=>$articlesPublish, 'articlesUnpublish'=>$articlesUnpublish, 'articlesDelete'=>$articlesDelete, 'students'=>$students, 'user'=>$user));
    }
}
