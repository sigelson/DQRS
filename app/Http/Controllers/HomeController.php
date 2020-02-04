<?php

namespace App\Http\Controllers;
use App\Queue;
use App\DB;

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
     * @return \Illuminate\View\View
     */
    public function index()
    {

        $queues=Queue::paginate(15);
        return view('dashboard',compact('queues'));
    }
}
