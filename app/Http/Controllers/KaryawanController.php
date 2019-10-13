<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Karyawan;
use App\Department;
use App\Position;
use App\Status;
use Yajra\Datatables\Datatables;
use Carbon\Carbon;
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
        $this->validate($request, [
            'nik' => 'required|max:10|unique:karyawans',
            'name' => 'required',
            'born' => 'required',
            'address' => 'required',
            'since' => 'required',   
        ]);
        
        $request['born'] = Carbon::parse($request->born)->format('Y-m-d');
        $request['since'] = Carbon::parse($request->since)->format('Y-m-d');
        
        Karyawan::create($request->all());
        Alert::success('Berhasil', 'Data berhasil disimpan!');
        return redirect()->route('karyawans.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $data = Karyawan::findOrFail($id);
        return view('karyawans.show', compact('data'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $data = Karyawan::findOrFail($id);
        return view('karyawans.edit', compact('data'));
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
        $this->validate($request, [
            //'nik' => 'required|max:10|unique:karyawans,name,'. $request->input('nik'),
            'name' => 'required',
            'born' => 'required',
            'address' => 'required',
            'since' => 'required',   
        ]);

        $data = Karyawan::findOrFail($id);
        $data->update($request->all());
        toast('Data berhasil diupdate','success','top-right');
        return redirect()->route('karyawans.index');
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
                    'show_url' => route('karyawans.show', $karyawans->nik),
                    'edit_url' => route('karyawans.edit', $karyawans->nik),
                    'delete_url' => route('karyawans.destroy', $karyawans->nik),
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
