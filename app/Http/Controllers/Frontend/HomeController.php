<?php

namespace App\Http\Controllers\Frontend;

use Illuminate\Http\Request;
use IlluminateViewFactory;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        // $this->middleware('auth');
        \View::addExtension('html', 'php');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('index'); 
    }
    public function test()
    {
        return view('test'); 
    }
    public function admin()
    {
        return view('backend'); 
    }
}
