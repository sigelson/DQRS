<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Validator,Redirect,Response;
use App\Report;
class ReportController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // $reports=Report::orderBy('id', 'DESC')->paginate(10);
        {
            if(request()->ajax()) {

                $query = Report::query();

                $from_date = (!empty($_GET["from_date"])) ? ($_GET["from_date"]) : ('');
                $to_date = (!empty($_GET["to_date"])) ? ($_GET["to_date"]) : ('');

                if($from_date && $to_date){

                 $from_date = date('Y-m-d', strtotime($from_date));
                 $to_date = date('Y-m-d', strtotime($to_date));

                 $query->whereRaw("date(reports.created_at) >= '" . $from_date . "' AND date(reports.created_at) <= '" . $to_date . "'");
                }
                $table = $query->select('*');
                return datatables()->of($table)
                    ->make(true);
            }
        // return view('reports.index',['reports' => $reports]);
        return view('reports.index');



    }
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
