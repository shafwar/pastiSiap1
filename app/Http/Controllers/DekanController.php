<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class DekanController extends Controller
{
    public function index()
    {
        return view('dekan.dashboard');
    }

    public function laporan()
    {
        return view('dekan.laporan');
    }

    public function approvals()
    {
        return view('dekan.approvals');
    }
}
