<?php

namespace App\Http\Controllers;

use App\Qcm;
use App\Question;
use App\Choice;

use Auth;
use Input;
use Redirect;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

class QcmController extends Controller
{
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

    	$arr = [];
    	$questions = $qcm->getQuestions;
    	foreach ($questions as $question) {
    		array_push($arr, ['question'=>$question, 'choices'=>$question->getChoices]);
    	}
    	return response()->json(['qcm' => $qcm,'data' => $arr]);
    }

    public function updateStatusMultiple(Request $request) {
    	
    	$idQcm = Input::get('id_selected_qcm');
    	$idQcm = substr($idQcm,1);
    	$idQcmArr = explode(',', $idQcm);

    	$action = Input::get('action');

    	foreach ($idQcmArr as $key => $value) {
	    	$qcm = Qcm::findOrFail($value);
	    	$qcm->status = $action;
    		$qcm->save();
    	}

    	return Redirect::to('professeur#QCM');
    }

    public function deleteMultiple(){
    	Qcm::where('status', '=', 2)->where('user_id', '=', Auth::user()->id)->delete();
    	return Redirect::to('professeur#QCM');
    }
}
