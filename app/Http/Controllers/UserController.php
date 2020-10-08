<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function index()
    {
        $user = new User();

        $data['title'] = 'Master User';
        $data['users'] = $user->all();

        return view('user.index', $data);
    }
}
