<?php

namespace App\Http\Controllers;
use Auth;
use App\Queue;
use DB;
use App\Counter;
use Carbon\Carbon;
use Illuminate\Http\Request;
use App\User;
use App\Events\NewQueue;
use App\Events\NewNotif;



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


        DB::table('notifications')->where('id', '1')->update(['text'=>$request->text]);
        event(new NewNotif());
        return redirect('admin')->withStatus(__('Notification message updated successfully.'));

    }


    public function callqueue(Request $request)

    {



        $request->validate([
            'called'=>['max:255'],
            'counter'=>['max:255']
        ]);

        $dept=Auth::user()->department;
        $call=Queue::where([
            ['department',$dept],
            ['called', 'no']
            ])
            ->whereDate('created_at', Carbon::today())
            ->orderBy('id', 'asc')
            ->first();
            // ->update(['called'=>$request->called,'counter'=>$request->counter]);

                    if ( ! is_null($call))
                    {
                        $call->update(['called'=>$request->called,'counter'=>$request->counter]);
                        $call->save();
                        event(new NewQueue($call));

                       return redirect('admin')->withStatus(__('Queue has been called.'));
                    }
                    else{
                        return redirect('admin')->withStatus(__('No available queue for calling.'));
                    }






    }


}
