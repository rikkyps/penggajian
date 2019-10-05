<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Department;
use Yajra\Datatables\Datatables;
use Alert;

class DepartmentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('departments.index');
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
        
        $this->validate($request, [
            'department_id' => 'required|max:8|min:8|unique:departments',
            'name' => 'required|min:5'
        ]);

        $departments = $request->all();
        Department::create($departments);
        Alert::success('Berhasil', 'Data berhasil disimpan!');
        return redirect()->route('departments.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $data = Department::findOrFail($id);
        return view('departments.show', compact('data'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $data = Department::findOrFail($id);
        return view('departments.edit', compact('data'));
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
        $data = Department::findOrFail($id);
        $this->validate($request, [
            'department_id' => 'required|max:8|min:8',
            'name' => 'required|min:5'
        ]);
        
        $data = Department::findOrFail($id);
        $data->update($request->all());
        toast('Data berhasil diupdate','success','top-right');
        return redirect()->route('departments.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        if (!Department::destroy($id)) return redirect()->back();
        Alert::success('Berhasil', 'Data berhasil dihapus!');
        return redirect()->route('departments.index');

    }

    public function dataTable()
    {
        $departments = Department::query();
        return DataTables::of($departments)
            ->addColumn('action', function($departments){
                return view('layouts.admin.partials_.action', [
                    'model' => $departments,
                    'show_url' => route('departments.show', $departments->department_id),
                    'edit_url' => route('departments.edit', $departments->department_id),
                    'delete_url' => route('departments.destroy', $departments->department_id),
                ]);
            })
            ->rawColumns(['action'])
            ->make(true);
    }
}
