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
use Mail;
use Nexmo;


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
            'called' => ['max:255'],
            'counter' => ['max:255']
        ]);

        $dept = Auth::user()->department;

        $call = Queue::where([
            ['department',$dept],
            ['called', 'no']
            ])
            ->whereIsPriority(true)
            ->whereDate('created_at', Carbon::today())
            ->orderBy('id', 'asc')
            ->first();

        if (!$call) {
            $call = Queue::where([
            ['department',$dept],
            ['called', 'no']
            ])
            ->whereDate('created_at', Carbon::today())
            ->orderBy('id', 'asc')
            ->first();
        }

        // ->update(['called'=>$request->called,'counter'=>$request->counter]);

        if ( ! is_null($call)) {
            $call->update(['called'=>$request->called,'counter'=>$request->counter]);

            $call->save();

            event(new NewQueue($call));

            $this->notifyNextOnQueue($call, $dept);

            return redirect('admin')->withStatus(__('Queue has been called.'));
        } else {
            return redirect('admin')->withStatus(__('No available queue for calling.'));
        }
    }

    public function notifyNextOnQueue($nowServing, $dept) 
    {
        $queue = Queue::where([
            ['department',$dept],
            ['called', 'no']
            ])
            ->whereIsPriority(true)
            ->whereDate('created_at', Carbon::today())
            ->orderBy('id', 'asc')
            ->take(3)->get();

        if (count($queue) < 2) {
           $queue = Queue::where([
            ['department',$dept],
            ['called', 'no']
            ])
            ->whereDate('created_at', Carbon::today())
            ->orderBy('id', 'asc')
            ->take(3)->get();
        }

        if (count($queue) == 3) {
            $this->notify($queue->get(2), 3);
        }

        if (count($queue) == 2) {
            $this->notify($queue->get(1), 2);
        }
    }

    public function notify($notifiable, $qtime)
    {
        $wtimecount = $qtime-1;
        $wtime = $wtimecount*3;

        // START EMAIL
        if ( ! is_null($notifiable->email)) {
            $data = array(
                'name' => $notifiable->name,
                'snumber' => $notifiable->snumber,
                'email' => $notifiable->email,
                'department' => $notifiable->department,
                'letter' => $notifiable->letter,
                'number' => $currnum,
                'transaction' => $notifiable->transaction,
                'remarks' => $notifiable->remarks,
                'wtime' => $wtime,
                'is_next' => true,
                'is_next_message' => 'Hi! Be ready you are ' . $qtime == 3 ? 'rd' : 'nd' . ' in the queue.'
            );

            Mail::send('emails.queue', $data, function ($message) use ($data){
                $message->from('dqrshelper@gmail.com');
                $message->to($data['email']);
                $message->subject('DQRS: Hi! Be ready.');
            });
        }
        // END EMAIL

        // START SMS
        if ( ! is_null($request->mobile)) {
            Nexmo::message()->send([
                'to'   => '639972255631', //for testing purposes
                'from' => 'DQRS',
                'text' => ("Hi! Be ready you are " . $qtime == 3 ? 'rd' : 'nd' . " in the queue.")
            ]);
        }
        // END SMS
    }

    // FOR RECALL

    public function recall($id)
    {
        $call=Queue::find($id);
        $call->get();
        event(new NewQueue($call));

        return redirect('admin')->withStatus(__('Queue has been recalled.'));

    }


}
