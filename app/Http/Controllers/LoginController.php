<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\authentication;
use eKantin;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

class LoginController extends Controller
{
    public function index()
    {
        if (isLogin()) {
            return redirect('dashboard');
        }

        return view('login/index');
    }

    public function auth(Request $request)
    {
        $auth = new authentication();
        $condition = false;

        $user = $auth->cekUser($request->input('username'), $request->input('password'));

        if ($user != null) {
            if ($user->roleId !== 3) {
                $condition = true;
            } else if ($user->roleId === 3) {
                return JSONResponseDefault(eKantin::FAILED, 'Role cannot login in web application');
            }
        }

        if ($condition) {
            Session::put('is_login', true);
            Session::put('username', $user->username);
            Session::put('roleId', $user->roleId);
            Session::put('userId', $user->userId);
            Session::put('name', $user->name);

            return JSONResponseDefault(eKantin::OK, 'Success login');
        } else {
            return JSONResponseDefault(eKantin::FAILED, 'Invalid username or password');
        }
    }

    function logout()
    {
        Auth::logout();
        Session::flush();
        return redirect('login');
    }
}
