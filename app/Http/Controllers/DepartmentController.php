<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Validation\Rule;


use App\Department;


class DepartmentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $departments = Department::paginate(5);


        return view('departments.index',
            compact('departments'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('departments.create');
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
            'name'=>'required|unique:departments|max:255',
            'letter'=>'required|unique:departments|max:1',
            'number'=>'required|max:1'
        ]);

        $department = new Department([
            'name' => $request->get('name'),
            'letter' => $request->get('letter'),
            'number' => $request->get('number')

        ]);
        $department->save();
        return redirect('departments')->withStatus(__('Database added successfully.'));
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
        $department = Department::find($id);
        return view('departments.edit', compact('department'));
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
            'name'=>['required','max:255',
            Rule::unique('departments')->ignore($id)],
            'letter'=>['required','max:1',
            Rule::unique('departments')->ignore($id)],
            'number'=>['required','max:1'],
        ]);

        $department = Department::find($id);
        $department->name =  $request->get('name');
        $department->letter = $request->get('letter');
        $department->number = $request->get('number');
        $department->save();

        return redirect('departments')->withStatus(__('Database updated successfully.'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $department = Department::find($id);
        $department->delete();

        return redirect('departments')->withStatus(__('Database successfully deleted.'));
    }
}
