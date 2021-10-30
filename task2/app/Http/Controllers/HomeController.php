<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Auth;
use DB;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $userType =  Auth::user()->name;
        $user_model = new User();
        $allUserCount = $user_model->getUsersCount();
        $adminCount = $user_model->getAdminCount();
        $teachersCount = $user_model->getTeachersCount();
        $studentCount = $user_model->getStudentsCount();
        return view('home', compact('userType','allUserCount','adminCount','teachersCount','studentCount'));
    }
}
