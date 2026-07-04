<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class FuelLogController extends Controller
{
    public function index()
    {
        return view('admin.fuel-logs.index');
    }
}
