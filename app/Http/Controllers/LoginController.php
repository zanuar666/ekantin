<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\authentication;
use Session;
use Auth;

class LoginController extends Controller
{
    public function index()
    {
        return view('login/index');
    }

    public function auth(Request $request)
    {
        $auth = new authentication();
        $condition= false;

        $user= $auth->cekUser($request->input('username'),$request->input('password'));
        
        if($user != null){
            if($user->roleId != '3'){
                $condition=true;
            }
        }

        if ($condition) {
            Session::put('is_login',true);
            Session::put('username',$user->username);
            Session::put('roleId',$user->roleId);
            Session::put('userId',$user->userId);
            Session::put('name',$user->name);

            echo json_encode(array(
                'RESULT' => 'OK',
                'MESSAGE' => 'Success login'
            ));
        } else {
           echo json_encode(array(
                'RESULT' => 'FAILED',
                'MESSAGE' => 'Invalid Username And Password'
            ));
        }
    }

    function logout()
    {
    	Auth::logout();
    	Session::flush();
    	return redirect('login');
    }
}
