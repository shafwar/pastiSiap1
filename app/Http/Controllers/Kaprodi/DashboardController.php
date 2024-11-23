<?php

namespace App\Http\Controllers\Kaprodi;

use App\Http\Controllers\Controller;

class DashboardController extends Controller
{
    public function index()
    {
        return view('kaprodi.dashboard');
    }
}
