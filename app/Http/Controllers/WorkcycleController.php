<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Workcycle;
use Alert;
use Yajra\Datatables\Datatables;
use Carbon\Carbon;

class WorkcycleController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('workcycles.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('workcycles.create');
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
            'tanggal' => 'required|date|unique:workcycles',
            'keterangan' => 'required|max:40',
        ]);

        $request['tanggal'] = Carbon::parse($request->tanggal)->format('Y-m-d');

        Workcycle::create($request->all());
        Alert::success('Berhasil', 'Data berhasil disimpan!');
        return redirect()->route('workcycles.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $data = Workcycle::findOrFail($id);
        return view('workcycles.show', compact('data'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $data = Workcycle::findOrFail($id);
        return view('workcycles.edit', compact('data'));
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
            'tanggal' => 'required|date|unique:workcycles,tanggal,'. $id,
            'keterangan' => 'required|max:40',
        ]);

        $request['tanggal'] = Carbon::parse($request->tanggal)->format('Y-m-d');
        $data = Workcycle::findOrFail($id);
        $data->update($request->all());
        toast('Data berhasil diupdate','success','top-right');
        return redirect()->route('workcycles.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        if (!Workcycle::destroy($id)) return redirect()->back();
        Alert::success('Berhasil', 'Data berhasil dihapus!');
        return redirect()->route('workcycles.index');
    }

    public function dataTable()
    {
        $workcycles = Workcycle::query();
        return DataTables::of($workcycles)
            ->addColumn('action', function($workcycles){
                return view('layouts.admin.partials_.action', [
                    'model' => $workcycles,
                    'show_url' => route('workcycles.show', $workcycles->id),
                    'edit_url' => route('workcycles.edit', $workcycles->id),
                    'delete_url' => route('workcycles.destroy', $workcycles->id),
                ]);
            })
            ->addColumn('tanggalformated', function($workcycles){
                return $workcycles->tanggal->format('d-M-Y');
            })
            ->rawColumns(['action', 'tanggalformated'])
            ->make(true);
    }
}
