<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function adminDashoard(Request $request)
    {
        return view('back.pages.Auth.dashboard');
    }

    public function categories(Request $request)
    {
        return view('back.pages.Auth.categories');
    }

    public function posts(Request $request)
    {
        return view('back.pages.Auth.post');
    }

    public function tags(Request $request)
    {
        return view('back.pages.Auth.tag');
    }

    public function commentsManager(Request $request)
    {
        return view('back.pages.Auth.adminCommentsManager');
    }

    public function usersManager(Request $request)
    {
        return view('back.pages.Auth.adminUsersManager');
    }

    public function subscribers()
    {
        return view('back.pages.adminSubscribersManager');
    }
    
}
