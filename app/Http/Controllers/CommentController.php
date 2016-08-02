<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Comment;

use Redirect;
use Validator;
use Akismet;
use Input;
use URL;

use App\Http\Requests;
use App\Http\Controllers\Controller;

class CommentController extends Controller
{
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
        	
        	$comment = Comment::create($request->all());

        	return redirect()->back()->with('alert-success','Votre commentaire a était ajouté avec succès!');
        }
        else 
        {
            return redirect()->back();
        }
    }
}
