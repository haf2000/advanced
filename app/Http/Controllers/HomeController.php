<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\reservation;
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
         $reservations = reservation::all();  
               return view('home')->with('reservations',$reservations);
    }
}
