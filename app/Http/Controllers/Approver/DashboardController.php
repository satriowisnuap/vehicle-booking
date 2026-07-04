<?php

namespace App\Http\Controllers\Approver;

use App\Http\Controllers\Controller;

class DashboardController extends Controller
{
    public function index()
    {
        return view('approver.dashboard');
    }
}
