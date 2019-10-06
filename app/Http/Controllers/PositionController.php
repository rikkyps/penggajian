<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Position;
Use Yajra\Datatables\Datatables;
Use Alert;

class PositionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('positions.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('positions.create');
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
            'name' => 'required|min:3|unique:positions',
            'tunjangan' => 'required|integer',
        ]);

        Position::create($request->all());
        Alert::success('Berhasil', 'Data berhasil disimpan!');
        return redirect()->route('positions.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $data = Position::findOrFail($id);
        return view('positions.show', compact('data'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $data = Position::findOrFail($id);
        return view('positions.edit', compact('data'));
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
            'name' => 'required|min:3|unique:positions,name,'. $id,
            'tunjangan' => 'required|integer',
        ]);

        $data = Position::findOrFail($id);
        $data->update($request->all());
        toast('Data berhasil diupdate','success','top-right');
        return redirect()->route('positions.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        if (!Position::destroy($id)) return redirect()->back();
        Alert::success('Berhasil', 'Data berhasil dihapus!');
        return redirect()->route('positions.index');
    }

    public function dataTable()
    {
        $positions = Position::query();
        return DataTables::of($positions)
            ->addColumn('action', function($positions){
                return view('layouts.admin.partials_.action', [
                    'model' => $positions,
                    'show_url' => route('positions.show', $positions->id),
                    'edit_url' => route('positions.edit', $positions->id),
                    'delete_url' => route('positions.destroy', $positions->id),
                ]);
            })
            ->addColumn('nominal_tunjangan', function($positions){
                return "Rp. ". number_format("$positions->tunjangan", 0, ",", ".");
            })
            ->rawColumns(['action', 'nominal_tunjangan'])
            ->make(true);

    }
}
