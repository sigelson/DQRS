<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Department;
use App\Queue;
use App\Report;
use App\Transaction;
use Mail;
use DB;
use Nexmo;
use Carbon\Carbon;

class QueueController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

            $queues=Queue::orderBy('id', 'DESC')->first();

            return view('queues.index',['queues' => $queues]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $departments=Department::all();
        $transactions=Transaction::all();
        return view('queues.create',['departments' => $departments],['transactions' => $transactions]);
    }



    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)

    {
        $validatedData = $request->validate([
            'name' => 'required|max:255',
            'snumber' => 'nullable|digits:8',
            'email' => 'nullable|max:255',
            'mobile' => 'nullable|digits:10',
            'department' => 'required|max:255',
            'transaction' => 'required|max:255',
            'letter' => 'required|max:255',
            'remarks' => 'nullable|max:255'
        ]);



        $queue = new Queue([
            'name' => $request->get('name'),
            'snumber' => $request->get('snumber'),
            'email' => $request->get('email'),
            'mobile' => $request->get('mobile'),
            'department' => $request->get('department'),
            'transaction' => $request->get('transaction'),
            'letter' => $request->get('letter'),
            'number' =>  DB::table('queues')->where('department',$request->department)->whereDate('created_at',Carbon::today())->count()+1,
            'remarks' => $request->get('remarks'),
            'called' => 'no',

        ]);
        $queue->save();

        $report = new Report([
            'name' => $request->get('name'),
            'snumber' => $request->get('snumber'),
            'email' => $request->get('email'),
            'mobile' => $request->get('mobile'),
            'department' => $request->get('department'),
            'letter' => $request->get('letter'),
            'number' =>  DB::table('queues')->where('department',$request->department)->whereDate('created_at',Carbon::today())->count()+1,
            'transaction' => $request->get('transaction'),
            'remarks' => $request->get('remarks'),
        ]);
        $report->save();


        $count=DB::table('queues')->where('department',$request->department)->whereDate('created_at',Carbon::today())->count();
        DB::table('departments')->where('name', $request->department)->update(['number'=> $count]);
        $currnum=DB::table('queues')->where('department',$request->department)->whereDate('created_at',Carbon::today())->count();

        $qtime = DB::table('queues')->where('department',$request->department)->whereDate('created_at',Carbon::today())->count();
        $wtimecount= $qtime-1;
        $wtime= $wtimecount*3;



                        // START EMAIL
                        if ( ! is_null($request->email))
                        {

                        $data=array(
                            'name'=>$request->name,
                            'snumber'=>$request->snumber,
                            'email'=>$request->email,
                            'department'=>$request->department,
                            'letter'=>$request->letter,
                            'number'=>$currnum,
                            'transaction'=>$request->transaction,
                            'remarks'=>$request->remarks,
                            'wtime'=>$wtime
                        );

                         Mail::send('emails.queue', $data, function ($message) use ($data){
                        $message->from('dqrshelper@gmail.com');
                        $message->to($data['email']);
                        $message->subject('DQRS: Here is your Queue number');
                        });

                        }
                        // END EMAIL


                        // START SMS
                        if ( ! is_null($request->mobile))
                        {

                        Nexmo::message()->send([
                        //'to'   => '63'.$request->mobile, //for live with full functioning SMS API

                        'to'   => '639972255631', //for testing purposes
                        'from' => 'DQRS',
                        'text' => ("Hi! Your Queue number is\n".$request->letter."-".$currnum."\n\nEstimated waiting time: ".$wtime." minutes.\n\nPlease wait for your turn.\n\nThank you for using DQRS.\n\n")
                            ]);

                        }
                        // END SMS








        return redirect('queues')->withStatus(__('Queue added successfully.'));


    }

    public function transactions()
    {

        $accounting1=Transaction::where('department','accounting')->get();
        $accounting=$accounting1->pluck('name')->all();
        $registrar1=Transaction::where('department','registrar')->get();
        $registrar=$registrar1->pluck('name')->all();
        $cashier1=Transaction::where('department','cashier')->get();
        $cashier=$cashier1->pluck('name')->all();

        return response()->json(compact('accounting','registrar','cashier'));

    }

    public function transactions2()
    {

        $accounting1=Transaction::where('department','accounting')->get();
        $accounting=$accounting1->pluck('name')->all();
        $registrar1=Transaction::where('department','registrar')->get();
        $registrar=$registrar1->pluck('name')->all();
        $cashier1=Transaction::where('department','cashier')->get();
        $cashier=$cashier1->pluck('name')->all();

        return response()->json(compact('accounting','registrar','cashier'));

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $queues=Queue::find($id);
        $departments=Department::all();
        $transactions=Transaction::all();
        return view('queues.edit',['departments' => $departments],['queues' => $queues],['transactions' => $transactions]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'department'=>'required|max:255',
            'transaction'=>'required|max:255',
            'letter'=>'required|max:255',
            'remarks' => 'nullable|max:255'
        ]);



        $queue = Queue::find($id);
        $queue->department = $request->get('department');
        $queue->remarks = $request->get('remarks');
        $queue->letter = $request->get('letter');
        $queue->number = DB::table('queues')->where('department',$request->department)->whereDate('created_at',Carbon::today())->count()+1;
        $queue->called = 'no';
        $queue->save();


        $qtime = DB::table('queues')->where('department',$request->department)->whereDate('created_at',Carbon::today())->count();
        $wtimecount= $qtime-1;
        $wtime= $wtimecount*3;


        if ( ! is_null($queue->email))
                        {

                        $data=array(
                            'name'=>$queue->name,
                            'snumber'=>$queue->snumber,
                            'email'=>$queue->email,
                            'department'=>$queue->department,
                            'letter'=>$queue->letter,
                            'number'=>$queue->number,
                            'transaction'=>$queue->transaction,
                            'remarks'=>$queue->remarks,
                            'wtime'=>$wtime
                        );

                         Mail::send('emails.queue', $data, function ($message) use ($data){
                        $message->from('dqrshelper@gmail.com');
                        $message->to($data['email']);
                        $message->subject('DQRS: Your Queue number has been transferred');
                        });

                        }
                        // END EMAIL


                        // START SMS
                        if ( ! is_null($queue->mobile))
                        {

                        Nexmo::message()->send([
                        //'to'   => '63'.$request->mobile, //for live with full functioning SMS API

                        'to'   => '639972255631', //for testing purposes
                        'from' => 'DQRS',
                        'text' => ("Hi! Your Queue has been transfered.\nYour new queue number is:\n".$queue->letter."-".$queue->number."\n\nEstimated waiting time: ".$wtime." minutes.\n\nPlease wait for your turn.\n\nThank you for using DQRS.\n\n")
                            ]);

                        }
                        // END SMS

        return redirect('admin')->withStatus(__('Queue has been transferred successfully.'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
