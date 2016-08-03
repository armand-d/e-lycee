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

    public function index(){
        $articlesAll = Post::where('user_id','=', Auth::user()->id)->orderBy('created_at', 'desc')->get();
        $articlesPublish = Post::where('user_id','=', Auth::user()->id)->orderBy('created_at', 'desc')->where('status','=',1)->get();
        $articlesUnpublish = Post::where('user_id','=', Auth::user()->id)->orderBy('created_at', 'desc')->where('status','=',0)->get();
        $articlesDelete = Post::where('user_id','=', Auth::user()->id)->orderBy('created_at', 'desc')->where('status','=',2)->get();

        return view('back-office.teacher.pages.article.index')->with(array('articlesAll'=>$articlesAll, 'articlesPublish'=>$articlesPublish, 'articlesUnpublish'=>$articlesUnpublish, 'articlesDelete'=>$articlesDelete));
    }

    public function create(){
        return view('back-office.teacher.pages.article.create');
    }

    public function store(Request $request) {

        $validator = Validator::make($request->all(), [
            'title'         => 'required|string',
			'content'       => 'required|max:2000',
			'url_thumbnail' => 'required|image',
        ]);

        if ($validator->fails()) {
            return redirect('professeur/article/create')->withErrors($validator)->withInput()->with('alert-danger','Merci de vérifier le formulaire');
        }

        $destinationPath = 'assets/images/uploads/';
		$extension = Input::file('url_thumbnail')->getClientOriginalExtension();
		$fileName = rand(11111,99999).'.'.$extension;
		Input::file('url_thumbnail')->move($destinationPath, $fileName);

        $post = Post::create($request->all());
        $post->user_id = Auth::user()->id;
        $post->url_thumbnail = url('assets/images/uploads/'.$fileName);
        $post->save();

    	return Redirect::to('professeur/article')->with('alert-success','Votre article a bien était ajouté !');
    }

    public function edit($id) {

        $article = Post::findOrFail($id);
        if ($article->user_id == Auth::user()->id) {
            return view('back-office.teacher.pages.article.edit')->with(array('article'=>$article));
        }

        return redirect('professeur/article')->with('alert-danger','Vous ne pouvez pas éditer cet article');
    }
 
    public function update(Request $request, $id) {

        $validator = Validator::make($request->all(), [
            'title'         => 'required|string',
            'content'       => 'required|max:2000',
            'url_thumbnail' => 'image',
        ]);

        if ($validator->fails()) {
            return redirect('professeur/article/'.$id.'/edit')->withErrors($validator)->withInput()->with('alert-danger','Merci de vérifier le formulaire');
        }

        $post = Post::findOrFail($id);
        $post->update($request->all());

        if (Input::file('url_thumbnail')) {
            $destinationPath = 'assets/images/uploads/';
            $extension = Input::file('url_thumbnail')->getClientOriginalExtension();
            $fileName = rand(11111,99999).'.'.$extension;
            Input::file('url_thumbnail')->move($destinationPath, $fileName);
            
            $post->url_thumbnail = url('assets/images/uploads/'.$fileName);
            $post->save();
        }
        

        return Redirect::to('professeur/article/'.$id.'/edit')->with('alert-success','Votre article a bien était modifié !');
    }

    public function updateMultiple(Request $request) {
        
        $idArticle = Input::get('id_selected_article');
        $idArticle = substr($idArticle,1);
        $idArticleArr = explode(',', $idArticle);

        $action = Input::get('action');

        foreach ($idArticleArr as $key => $value) {
            $article = Post::findOrFail($value);
            $article->status = $action;
            $article->save();
        }
            return Redirect::to('professeur/article')->with('alert-success','Statut modifié avec succès !');
    }

    public function deleteMultiple(){
        Post::where('status', '=', 2)->where('user_id', '=', Auth::user()->id)->delete();
        return Redirect::to('professeur/article')->with('alert-success','Votre corbeille est vidé !');
    }

    public function show($id) {
        $article = Post::findOrFail($id);
        return response()->json($article);
    }

}
