<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Presence;
use App\PresenceState;
use App\Karyawan;
use App\Department;
use Yajra\Datatables\Datatables;
use Alert;

class PresenceController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('presences.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('presences.create');
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
            'name' => 'required',
            'tanggal_masuk' => 'required',
            'jam_masuk' => 'required',
            'tanggal_pulang' => 'required',
            'jam_pulang' => 'required',
            'status_kehadiran' => 'required'
        ]);

        $karyawan = Karyawan::where('name', $request->get('name'))->first();

        if ($karyawan != null)
        {
            $data = [
                'nik' => $karyawan->nik,
                'tanggal_masuk' => $request->tanggal_masuk.' '.$request->jam_masuk,
                'tanggal_pulang' => $request->tanggal_pulang.' '.$request->jam_pulang,
                'kode_kehadiran' => $request->status_kehadiran,
            ];

            Presence::insert($data);
            Alert::success('Berhasil', 'Data berhasil disimpan!');
            return redirect()->route('presences.index');

        }else{

            Alert::warning('Nama Karyawan Tidak Ada', 'Karyawan tersebut tidak terdaftar!');
            return redirect()->back()->withInput();

        }
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
        $data = Karyawan::select('karyawans.nik', 'karyawans.name', 'presences.id', 'presence_states.keterangan')
        ->leftJoin('presences', 'presences.nik', '=', 'karyawans.nik')
        ->leftJoin('presence_states', 'presence_states.kode_kehadiran', '=', 'presences.kode_kehadiran');
        return DataTables::of($data)
            ->addColumn('action', function($data){
                return view('layouts.admin.partials_.action', [
                    'model' => $data,
                    'show_url' => route('presences.show', $data->id),
                    'edit_url' => route('presences.edit', $data->id),
                    'delete_url' => route('presences.destroy', $data->id),
                ]);
            })
            ->addColumn('tanggalmasuk_formated', function($data){
                $presences = Presence::find($data->id);
                return $presences->tanggal_masuk->format('d-M-Y H:i:s');
            })
            ->addColumn('tanggalpulang_formated', function($data){
                $presences = Presence::find($data->id);
                return $presences->tanggal_pulang->format('d-M-Y H:i:s');
            })
            ->addColumn('nama_department', function($data){
                $search = Karyawan::find($data->nik);
                $departments = Department::where('department_id', $search->id_department)->first();
                return $departments->name;

            })
            ->rawColumns(['action'])
            ->make(true);
    }
}
