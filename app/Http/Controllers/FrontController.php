<?php

namespace App\Http\Controllers;

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
        return view('front-office.pages.actualites');
    }

    public function showPresentation()
    {
        return view('front-office.pages.presentation');
    }


}