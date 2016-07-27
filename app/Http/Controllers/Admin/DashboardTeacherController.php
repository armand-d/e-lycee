<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class DashboardTeacherController extends Controller
{

	public function __construct()
    {

    }

    public function index(){
    	return view('back-office.teacher.pages.index');
    }
}
