<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Comment;

use Redirect;
use Validator;
use Akismet;
use Input;
use URL;
use Auth;

use App\Http\Requests;
use App\Http\Controllers\Controller;

class CommentController extends Controller
{

    public function __construct() {
        $this->middleware('auth,adminTeacher')->except('create');
    }

    public function create(Request $request) {

        if( \Akismet::validateKey() ) 
        {
            \Akismet::setCommentAuthor(Input::get('title'))
            ->setCommentAuthorUrl(URL::previous())
            ->setCommentContent(Input::get('content'))
            ->setCommentType('comment');

            if( \Akismet::isSpam() )
            {
                return redirect()->back()->with('alert-danger','Merci de vérifier le formulaire');
            }

        	$validator = Validator::make($request->all(), [
    			'status'  => 'required|regex:/^[1-1]/',
    			'title'   => 'required|string|max:200',
    			'content' => 'required|string|max:500'
            ]);

            if ($validator->fails()) {
    	    	return redirect()->back()->withErrors($validator)->withInput()->with('alert-danger','Merci de vérifier le formulaire');
            }
        	
            if(Auth::check()) $userId = Auth::user()->id; else $userId = NULL;

            $comment = Comment::create($request->all());
        	$comment->user_id = $userId;
            $comment->save();

        	return redirect()->back()->with('alert-success','Votre commentaire a était ajouté avec succès!');
        }
        else 
        {
            return redirect()->back();
        }
    }

    public function destroy($id) {
        Comment::where('id', '=', $id)->delete();
        return Redirect::back()->with('alert-success','Le commentaire a bien était supprimé');
    }
}
