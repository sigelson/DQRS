<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class LoginController extends Controller
{
	public function loginIndex()
    {
       	if (!auth()->check()) {
    		return view('auth.login');
    	}

    	return redirect('/');
    }

    public function login()
    {
    	$this->validate(request(), [
            'email' => 'required|email',
            'password' => 'required'
        ]);

        if (\Auth::attempt(['email' =>  request('email'), 'password' => request('password')])) {

        	//Logout old device
        	auth()->logoutOtherDevices(request('password'));

            return redirect()->intended('/admin-dashboard');

        } else {

            return redirect('/login')->with('error', 'You are not authorized');

        }
    }

    public function logout()
    {
        auth()->logout();

    	return redirect('/admin-dashboard');
    }
}
