<?php

namespace App\Http\Controllers\Admin\Student;

use \App\Qcm;
use \App\Question;
use \App\Choice;
use \App\Score;

use Auth;
use Input;
use Redirect;
use Validator;

use \Illuminate\Http\Request;
use \App\Http\Requests;
use \App\Http\Controllers\Controller;

class QcmStudentController extends Controller
{
    
    public function show($id) {

        $qcm = Qcm::findOrFail($id);

        $arr = [];
        $questions = $qcm->getQuestions;
        foreach ($questions as $question) {
            array_push($arr, ['question'=>$question, 'choices'=>$question->getChoices]);
        }
        return response()->json(['qcm' => $qcm,'data' => $arr]);
    }

    public function store(Request $request){
        
        $qcm = Qcm::findOrFail(Input::get('qcm_id'));
        $questions = $qcm->getQuestions;
        $score = 0;

        foreach ($questions as $key => $question) {
            $validator = Validator::make($request->all(), ['question-'.$question->id => 'required']);
            if ($validator->fails()) {
                return response()->json(['status' => 'error']);
            }
        }

        foreach ($questions as $key => $question) {
            if (Input::get('question-'.$question->id) == $question->response) {
                $score++;
            }
        }

        $data = array(
            'user_id'    => Auth::user()->id,
            'qcm_id'     => $qcm->id, 
            'status_qcm' => 1, 
            'note'       => $score
        );

        Score::create($data);

        return response()->json(['nbr_question' => $qcm->nbr_question,'score' => $score]);

    }
}
