<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Transaction;
use App\Department;
use Illuminate\Support\Facades\DB;
use Illuminate\Validation\Rule;

class TransactionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $transactions=Transaction::all();
        $accountings= Transaction::where('department', 'Accounting')->get();
        $cashiers= Transaction::where('department', 'Cashier')->get();;
        $registrars= Transaction::where('department', 'Registrar')->get();;


        return view('transactions.index',['transactions'=>$transactions, 'accountings' => $accountings, 'registrars' => $registrars, 'cashiers' => $cashiers]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $departments= Department::all();
        return view('transactions.create',compact('departments'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'name'=>'required|max:255',
            'department'=>'required|max:255'

        ]);
        $transaction = new Transaction([
            'name' => $request->get('name'),
            'department' => $request->get('department'),


        ]);
        $transaction->save();
        return redirect('transactions')->withStatus(__('Transaction added successfully.'));
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
        $transaction=Transaction::find($id);
        $departments=Department::all();
        return view('transactions.edit', compact('transaction'),['departments' => $departments]);
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
            'name'=>'required|max:255',
            'department'=>'required|max:255'
        ]);

        $transaction = Transaction::find($id);
        $transaction->name =  $request->get('name');
        $transaction->department = $request->get('department');
        $transaction->save();

        return redirect('transactions')->withStatus(__('Transaction updated successfully.'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $transaction = Transaction::find($id);
        $transaction->delete();

        return redirect('transactions')->withStatus(__('Transaction successfully deleted.'));
    }
}
