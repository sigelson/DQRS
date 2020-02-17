<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Queue;
use DB;

class DisplayController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $cashier1=DB::table('queues')->where([
            ['department', '=', 'cashier'],
            ['called', '=', 'yes'],
            ['counter', '=', 'Counter 1']])->orderBy('number', 'DESC')->first();

        $cashier2=DB::table('queues')->where([
            ['department', '=', 'cashier'],
            ['called', '=', 'yes'],
            ['counter', '=', 'Counter 2']])->orderBy('number', 'DESC')->first();

        $accounting1=DB::table('queues')->where([
            ['department', '=', 'accounting'],
            ['called', '=', 'yes'],
            ['counter', '=', 'Counter 1']])->orderBy('number', 'DESC')->first();

        $accounting2=DB::table('queues')->where([
            ['department', '=', 'accounting'],
            ['called', '=', 'yes'],
            ['counter', '=', 'Counter 2']])->orderBy('number', 'DESC')->first();

        $registrar1=DB::table('queues')->where([
            ['department', '=', 'registrar'],
            ['called', '=', 'yes'],
            ['counter', '=', 'Counter 1']])->orderBy('number', 'DESC')->first();

        $registrar2=DB::table('queues')->where([
            ['department', '=', 'registrar'],
            ['called', '=', 'yes'],
            ['counter', '=', 'Counter 2']])->orderBy('number', 'DESC')->first();

        $notification=DB::table('notifications')->where('id', '1')->value('text');

        return view('display.index',compact('cashier1','cashier2','accounting1','accounting2','registrar1','registrar2','notification')
        );
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
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
