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
            'snumber' => 'required|digits:8',
            'email' => 'required|max:255',
            'mobile' => 'required|digits:10',
            'department' => 'required|max:255',
            'transaction' => 'required|max:255',
            'letter' => 'required|max:255',
            'remarks' => 'nullable|max:255'
        ]);

        //get the last number in the database
        // $number = Queue::orderBy('number', 'DESC')->first();

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

        // $data=array(

        //     'name'=>$request->name,
        //     'snumber'=>$request->snumber,
        //     'email'=>$request->email,
        //     'department'=>$request->department,
        //     'letter'=>$request->letter,
        //     'number'=>$request->number,
        //     'transaction'=>$request->transaction,
        //     'remarks'=>$request->remarks

        // );

        //NOT IN CODE // DB::table('departments')->increment('number', 1, ['name' => $request->department]);

        // Mail::send('emails.queue', $data, function ($message) use ($data){
        //     $message->from('dqrshelper@gmail.com');
        //     $message->to($data['email']);
        //     $message->subject('DQRS: Here is your Queue number');
        // });

        // Nexmo::message()->send([
        //     'to'   => '63'.$request->mobile,
        //     'from' => 'DQRS',
        //     'text' => ('Hi! Your Queue number is '.$request->letter.'-'.$request->number.'. Thank you for using DQRS.')
        // ]);

        return redirect('queues')->withStatus(__('Queue added successfully. You will receive an SMS and/or an email to confirm your transaction.'));
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
        //
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
        //
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
