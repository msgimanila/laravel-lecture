<?php

namespace App\Http\Controllers;
use Gate;
 
use App\Course;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Facade;
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
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('home');
    }
	public function update()
    {
	     echo "test";
 
    }
}
