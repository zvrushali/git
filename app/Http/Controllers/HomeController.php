<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

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
<<<<<<< HEAD
     * @return \Illuminate\Http\Response
=======
     * @return \Illuminate\Contracts\Support\Renderable
>>>>>>> d1cb5ffb453ba83f73b8ec0964c6d505c698d739
     */
    public function index()
    {
        return view('home');
    }
}
