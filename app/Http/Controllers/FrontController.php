<?php

namespace App\Http\Controllers;

use App\Post;
use App\Comment;

use Config;
use Mail;
use Auth;
use View;
use Storage;
use Input;
use Redirect;
use Validator;

use Carbon\Carbon;
use App\Score\IScore;
use App\Http\Requests;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Cache;


class FrontController extends Controller
{

    /**
     * @param IScore $score
     * @return View
     */
    public function index()
    {   
        $actualites = Post::where('status','=',1)->orderBy('created_at', 'desc')->limit(4)->get();
        return view('front-office.pages.index')->with(array('actualites'=>$actualites));
    }

    public function showContact()
    {
        return view('front-office.pages.contact');
    }

    public function sendContact(Request $request)
    {
        
        $validator = Validator::make($request->all(), [
            'email'     => 'required|email',
            'subject'     => 'required|string|max:100',
            'content'    => 'required|max:500'
        ]);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput()->with('alert-danger','Merci de vérifier le formulaire');
        }

        $email = $request->input('email');
        $subject = $request->input('subject');
        $content = $request->input('content');

        Mail::send('emails.contact', ['email' => $email,'content' => $content,'subject' => $subject], function ($m) use ($email,$subject,$content) {
            $m->from(Config::get('mail.from')['address'], Config::get('mail.from')['name']);

            $m->to(Config::get('mail.from')['address'], 'Nouveau contact')->subject($subject);
        });

        return Redirect::back()->with('alert-success','Votre message à bien était envoyer');
    }

    public function showMentionLegales()
    {
        return view('front-office.pages.mentions-legales');
    }

    public function showActualites()
    {
        $actualites = Post::where('status','=',1)->orderBy('created_at', 'desc')->paginate(5);

        return view('front-office.pages.actualites')->with(array('actualites'=>$actualites));
    }

    public function showPresentation()
    {
        return view('front-office.pages.presentation');
    }

    public function showSingleActualite($id, $title) {
        $actualite = Post::findOrFail($id);
        return view('front-office.pages.actualite')->with(array('actualite'=>$actualite));
    }

    public function search(){
        $q = Input::get('q');
        if (empty($q)) {
            return Redirect::back()->with('alert-danger','Le champ de recherche est vide...');
        }
        
        $query = Post::where('title','like', '%'.$q.'%')->orWhere('content','like', '%'.$q.'%')->orderBy('created_at', 'desc');
        $allResults = $query->get();
        $results = $query->paginate(5);

        if (count($results) == 0) {
            return Redirect::back()->with('alert-danger','Aucun résultats...');
        }

        return view('front-office.pages.search')->with(array('results'=>$results,'allResults'=>$allResults,'q'=>$q));

    }


}