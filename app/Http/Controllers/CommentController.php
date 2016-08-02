<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Comment;

use Redirect;
use Validator;

use App\Http\Requests;
use App\Http\Controllers\Controller;

class CommentController extends Controller
{
    public function create(Request $request) {

    	$validator = Validator::make($request->all(), [
			'status'  => 'required|regex:/^[1-1]/',
			'title'   => 'required|string|max:200',
			'content' => 'required|string|max:500'
        ]);

        if ($validator->fails()) {
	    	return redirect()->back()->withErrors($validator)->withInput();
        }
    	
    	$comment = Comment::create($request->all());

    	return redirect()->back();
    }
}
