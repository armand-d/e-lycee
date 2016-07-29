<?php

namespace App\Http\Controllers\Admin;

use App\Qcm;
use App\Question;
use App\Choice;

use Auth;
use Input;
use Redirect;

use App\Http\Requests;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

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

    	return view('back-office.teacher.pages.index')->with(array('qcmsAll'=>$qcmsAll, 'qcmsPublish'=>$qcmsPublish, 'qcmsUnpublish'=>$qcmsUnpublish, 'qcmsDelete'=>$qcmsDelete));
    }

    public function store(Request $request){

    	$this->validate($request, [
			'title_qcm'     => 'required',
			'level_qcm'     => 'required',
			'nbr_choice'    => 'required',
			'nbr_questions' => 'required'
        ]);

		$dataQcm = array(
			'user_id'	   => Auth::user()->id,
			'title'        => Input::get('title_qcm'), 
			'level'        => Input::get('level_qcm'), 
			'nbr_choice'   => Input::get('nbr_choice'),
			'nbr_question' => Input::get('nbr_questions'),
			'status'       => 0
		);
    	$qcm = Qcm::create($dataQcm);
    	for ($i=0; $i < $qcm->nbr_question; $i++) { 
			$dataQuestion = array(
				'qcm_id' => $qcm->id, 
				'title' => Input::get('question-'.$i), 
				'response' => Input::get('response-'.$i) 
			);
			$question = Question::create($dataQuestion);

			for ($j=0; $j < $qcm->nbr_choice; $j++) { 
				$dataChoice = array(
					'question_id' => $question->id, 
					'title' => Input::get('choice-'.$i.'-'.$j)
				);
				Choice::create($dataChoice);
			}
    	}

    	return Redirect::to('professeur#QCM');
    }

    public function show($id) {

    	$qcm = Qcm::findOrFail($id);
    	
    }
}
