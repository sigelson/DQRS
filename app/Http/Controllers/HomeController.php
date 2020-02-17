<?php

namespace App\Http\Controllers;
use Auth;
use App\Queue;
use DB;
use App\Counter;
use Carbon\Carbon;
use Illuminate\Http\Request;
use App\User;



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
        $dept=Auth::user()->department;
        $notification = DB::table('notifications')->where('id', '1')->value('text');
        $queues=Queue::where('department',$dept)
                       ->whereDate('created_at', Carbon::today())
                       ->orderBy('id', 'desc')
                       ->paginate(10);

        $counters=Counter::all();
        return view('dashboard',compact('queues','notification','counters'));
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
