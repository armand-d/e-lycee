<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Redirect;
use Validator;
use Input;
use Auth;

use App\Post;

use App\Http\Requests;
use App\Http\Controllers\Controller;

class ArticleController extends Controller
{
    public function store(Request $request) {

        $validator = Validator::make($request->all(), [
            'title'         => 'required|string',
			'content'       => 'required|max:250',
			'url_thumbnail' => 'required|image',
        ]);

        if ($validator->fails()) {
            return redirect('professeur#ajouter-article')->withErrors($validator)->withInput();
        }

        $destinationPath = 'assets/images/uploads/';
		$extension = Input::file('url_thumbnail')->getClientOriginalExtension();
		$fileName = rand(11111,99999).'.'.$extension;
		Input::file('url_thumbnail')->move($destinationPath, $fileName);

        $post = Post::create($request->all());
        $post->user_id = Auth::user()->id;
        $post->url_thumbnail = public_path().'/assets/images/uploads/'.$fileName;
        $post->save();

    	return Redirect::to('professeur#articles');
    }
}
