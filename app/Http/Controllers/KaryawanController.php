<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Karyawan;
use App\Department;
use App\Position;
use Yajra\Datatables\Datatables;
use Alert;

class KaryawanController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('karyawans.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('karyawans.create');
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

    public function dataTable()
    {
        $karyawans = Karyawan::query();
        return DataTables::of($karyawans)
            ->addColumn('action', function($karyawans){
                return view('layouts.admin.partials_.action', [
                    'model' => $karyawans,
                    'show_url' => route('positions.show', $karyawans->nik),
                    'edit_url' => route('positions.edit', $karyawans->nik),
                    'delete_url' => route('positions.destroy', $karyawans->nik),
                ]);
            })
            ->addColumn('department', function($karyawans){
                  $data = Karyawan::join('departments', 'departments.department_id','=','karyawans.id_department')->get();
                  foreach ($data as $row){
                    return $row->name;
                  }
            })
            ->addColumn('jabatan', function($karyawans){
                return $karyawans->position->name;
            })
            ->addColumn('masukkerja', function($karyawans){
                return $karyawans->since->format('d-M-Y');
            })
            ->rawColumns(['action', 'jabatan', 'department'])
            ->make(true);
    }
}
