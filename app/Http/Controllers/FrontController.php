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
        return view('front-office.pages.home');
    }
}