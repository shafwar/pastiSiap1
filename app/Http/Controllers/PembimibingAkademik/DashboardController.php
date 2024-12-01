<?php

namespace App\Http\Controllers\pembimbingakademikController;

use App\Http\Controllers\Controller;

class DashboardController extends Controller
{
    public function index()
    {
        return view('pembimbingakademik.dashboard');
    }
}
