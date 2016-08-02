<?php

namespace App\Http\Controllers;

use App\Post;
use App\Comment;

use Mail;
use Auth;
use View;
use Storage;
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

        return view('front-office.pages.index');
    }

    public function showContact()
    {
        return view('front-office.pages.contact');
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


}