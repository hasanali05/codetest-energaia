<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Post;
use App\Category;
use App\User;

class HomeController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:web')->except('page404');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return redirect()->route('user.index');
    }
    public function page404()
    {
        return view('pages.page404');
    }
}
