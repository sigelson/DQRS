<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Department;
use App\Queue;

class QueueController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        $departments=Department::all();

        return view('queues.index',['departments' => $departments]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $departments=Department::all();

        return view('queues.create',['departments' => $departments]);
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
            'snumber' => 'required|max:255',
            'email' => 'required|max:255',
            'department' => 'required|max:255',
            'transaction' => 'required|max:255',
            'letter' => 'required|max:255',
            'number' => 'required|max:255',
            'remarks' => 'nullable|max:255'
        ]);
        $queue = new Queue([
            'name' => $request->get('name'),
            'snumber' => $request->get('snumber'),
            'email' => $request->get('email'),
            'department' => $request->get('department'),
            'transaction' => $request->get('transaction'),
            'letter' => $request->get('letter'),
            'number' => $request->get('number'),
            'remarks' => $request->get('remarks'),
            'called' => 'no',

        ]);
        $queue->save();
        return redirect('send-mail')->withStatus(__('Queue added successfully.'));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
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
