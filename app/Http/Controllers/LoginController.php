<?php

namespace App\Http\Controllers;

use View;
use Auth;
use Validator;
use App\Http\Requests;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\ThrottlesLogins;

class LoginController extends Controller
{

    use ThrottlesLogins;

    public function login(Request $request)
    {
        if ($request->isMethod('post')) {
            if ($request->ajax())
            {
                $credentials = $request->only('username', 'password');

                $validator = Validator::make($credentials, 
                    ['username' => 'required', 'password' => 'required']);  
                
                if ($validator->fails())  {
                    return response()->json(['require' => $validator->errors()]);
                }

                $remember = !empty($request->input('remember')) ? true : false;

                if (Auth::attempt($credentials, $remember)) {
                    return response()->json(['ok' => auth()->user()->role]);
                }

                return response()->json(['response' => 'fail']);
                
            } else {

                $this->validate($request, [
                    'username' => 'required',
                    'password' => 'required',
                    'remember' => 'in:remember'
                ]);

                $remember = !empty($request->input('remember')) ? true : false;

                $credentials = $request->only('username', 'password');
                if (Auth::attempt($credentials, $remember)) {
                    if (Auth::user()->role == 'teacher') {
                        return redirect('professeur')->with(['message' => 'success']);
                    } else {
                        return redirect('etudiant')->with(['message' => 'success']);
                    }
                } else {
                    return back()->withInput($request->only('username', 'remember'))->with(['message' => trans('app.noAuth'), 'alert' => 'warning']);
                }
            }
        } else return redirect('/#connexion');
    }

    public function logout()
    {
        Auth::logout();

        return redirect()->home();
    }
}
