<?php

namespace App\Http\Controllers;
use App\Models\User;

use Illuminate\Http\Request;

class LoginController extends Controller
{
    public function index(Request $request) {

        $erro = '';
        if($request->get('error') == 1) {
            $erro = 'User and/or password were not found';
        };

        if($request->get('error') == 2) {
            $erro = 'User needs to login to continue';
        };
        return view('site.login', ['title' => 'Login', 'erro' => $erro]);
    }

    public function auth(Request $request) {
        
        //validation rules

        $rules = [
            'user' => 'email',
            'password' => 'required'
        ];

        $request->validate($rules);

        $email = $request->get('user');
        $password = $request->get('password');

        //Start user model

        $user = new User();

        $exists = $user->where('email', $email)->where('password', $password)->get()->first();

        if(isset($exists->name)) {
            session_start();
            $_SESSION['name'] = $exists->name;
            $_SESSION['email'] = $exists->email;

            return redirect()->route('app.home');
        } else {
            return redirect()->route('site.login', ['error' => 1]);
        }
    }

    public function logout() {
       session_destroy();
       return redirect()->route('site.index');
    }
}
