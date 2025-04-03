<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function adminDashoard(Request $request)
    {
        return view('back.pages.Auth.dashboard');
    }
}
