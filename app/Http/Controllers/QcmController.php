<?php

namespace App\Http\Controllers;

use App\Qcm;
use App\Question;
use App\Choice;
use App\Score;

use Auth;
use Input;
use Redirect;
use Validator;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Controllers\Controller;

class QcmController extends Controller
{

    public function index(){
        $qcmsAll = Qcm::where('user_id','=', Auth::user()->id)->orderBy('created_at', 'desc')->get();
        $qcmsPublish = Qcm::where('user_id','=', Auth::user()->id)->orderBy('created_at', 'desc')->where('status','=',1)->get();
        $qcmsUnpublish = Qcm::where('user_id','=', Auth::user()->id)->orderBy('created_at', 'desc')->where('status','=',0)->get();
        $qcmsDelete = Qcm::where('user_id','=', Auth::user()->id)->orderBy('created_at', 'desc')->where('status','=',2)->get();

        return view('back-office.teacher.pages.qcm.index')->with(array('qcmsAll'=>$qcmsAll, 'qcmsPublish'=>$qcmsPublish, 'qcmsUnpublish'=>$qcmsUnpublish, 'qcmsDelete'=>$qcmsDelete));
    }

    public function create(Request $request){

        if (!Input::get('qcm_create')) {
            return view('back-office.teacher.pages.qcm.create');
        }

        $validator = Validator::make($request->all(), [
            'title_qcm'     => 'required',
            'level_qcm'     => 'required',
            'nbr_choice'    => 'required',
            'nbr_questions' => 'required'
        ]);

        if ($validator->fails()) {
            return redirect('professeur/qcm')->with('alert-danger','Une erreur c\'est produite');
        }

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

    	return Redirect::to('professeur/qcm')->with('alert-success','Votre QCM a bien était ajouté !');
    }

    public function edit($id) {

        $qcm = Qcm::findOrFail($id);
        if ($qcm->user_id == Auth::user()->id) {
            return view('back-office.teacher.pages.qcm.edit')->with(array('qcm'=>$qcm));
        }

        return redirect('professeur/qcm')->with('alert-danger','Vous ne pouvez pas éditer ce QCM');
    }

    public function update(Request $request, $id) {

        $currentQcm = Qcm::findOrFail($id);

        $validator = Validator::make($request->all(), [
            'title_qcm' => 'required',
            'level_qcm' => 'required',
            'status'    => 'required'
        ]);

        if ($validator->fails()) {
            return redirect('professeur/qcm')->with('alert-danger','Une erreur c\'est produite');
        }

        $dataQcm = array(
            'title'  => Input::get('title_qcm'), 
            'level'  => Input::get('level_qcm'),
            'status' => Input::get('status')
        );

        $currentQcm->update($dataQcm);

        foreach ($currentQcm->questions as $key => $question) {

            $currentQuestion = Question::findOrFail($question->id);
            
            $dataQuestion = array(
                'title' => Input::get('question-'.$key), 
                'response' => Input::get('response-'.$key) 
            );

            $currentQuestion->update($dataQuestion);

            foreach ($currentQuestion->choices as $keyB => $choice) {
                $currentChoice = Choice::findOrFail($choice->id);
                $dataChoice = array(
                    'title' => Input::get('choice-'.$key.'-'.$keyB)
                );
                $currentChoice->update($dataChoice);
            }
        }

        return redirect('professeur/qcm/'.$id.'/edit')->with('alert-success','Votre QCM a bien était modifié !');
    }

    public function updateMultiple(Request $request) {
    	
    	$idQcm = Input::get('id_selected_qcm');
    	$idQcm = substr($idQcm,1);
    	$idQcmArr = explode(',', $idQcm);

    	$action = Input::get('action');

    	foreach ($idQcmArr as $key => $value) {
	    	$qcm = Qcm::findOrFail($value);
	    	$qcm->status = $action;
    		$qcm->save();
    	}
            return Redirect::to('professeur/qcm')->with('alert-success','Statut modifié avec succès !');
    }

    public function deleteMultiple(){
    	Qcm::where('status', '=', 2)->where('user_id', '=', Auth::user()->id)->delete();
    	return Redirect::to('professeur#QCM');
    }

    // student

    public function indexStudent (){
         $qcms = Qcm::where('level', '=', Auth::user()->level)->where('status', '=', 1)->get();
         return view('back-office.student.pages.qcm.index')->with(array('qcms'=>$qcms));
    }

    public function show(Request $request, $id){

        $qcm =  Qcm::findOrFail($id);
        
        if (!Input::get('qcm_submit')) {
            return view('back-office.student.pages.qcm.show')->with(array('qcm'=>$qcm));
        }

        $questions = $qcm->questions;
        $score = 0;

        foreach ($questions as $key => $question) {
            $validator = Validator::make($request->all(), ['question-'.$question->id => 'required']);
            if ($validator->fails()) {
                return Redirect::back()->with('alert-danger','Vous devez répondre à toutes les questions !');
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

        return Redirect::to('etudiant/qcm')->with('alert-success','Vous avez fini !');

    }

}
