<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\TopupHistory;
use App\Topup;

class DashboardController extends Controller
{
    public function index()
    {
        $data['title'] = 'Dashboard';

        return view('index', $data);
    }
}
