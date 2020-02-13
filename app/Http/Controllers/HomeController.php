<?php

namespace App\Http\Controllers;
use App\Queue;
use DB;
use Carbon\Carbon;
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
     * @return \Illuminate\View\View
     */
    public function index()
    {
        $notification = DB::table('notifications')->where('id', '1')->value('text');
        $queues=Queue::whereDate('created_at', Carbon::today())->orderBy('id', 'desc')->paginate(10);
        return view('dashboard',compact('queues'),compact('notification'));
    }

    public function updatenotif(Request $request)

    {
        $request->validate([
            'text'=>['max:255']

        ]);

        DB::table('notifications')->where('id', '1')->update(['text'=>$request->text]);


        return redirect('admin')->withStatus(__('Notification message updated successfully.'));
    }

}
