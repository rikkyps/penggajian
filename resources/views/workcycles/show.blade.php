@extends('layouts.admin.app')

@section('titlebar', 'Aplikasi Penggajian | Show Data Work Cycle')

@section('content')
  <section class="content-header">
    <h1>
      Work Cycle /<small>Show Data</small>
    </h1>
    <ol class="breadcrumb">
      <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
      <li><a href="#">Layout</a></li>
      <li class="active">Top Navigation</li>
    </ol>
  </section>

  <section class="content">
    <div class="row">
      <!-- left column -->
      <div class="col-md-6 col-md-offset-3">
        <!-- general form elements -->
        <div class="box box-primary">
          <!-- /.box-header -->
          <!-- form start -->
          <div class="box-body">
            <div class="form-group">
              <label>ID</label>
              <input type="text" class="form-control" value="{{ $data->id }}" readonly>
            </div>
            <div class="form-group">
              <label>Tanggal</label>
              <div class="row">
                <div class="col-md-6">
                  <input type="text" class="form-control" value="{{ $data->tanggal }}" readonly>
                </div>
              </div>
            </div>
            <div class="form-group">
              <label>Keterangan</label>
              <input type="text" class="form-control" value="{{ $data->keterangan }}" readonly>
            </div>
          </div>
          <div class="box-footer">
            <a href="{{ route('workcycles.index') }}" class="btn btn-default">Back</a>
          </div>
        </div>
        <!-- /.box -->
      </div>
    </div>
  </div>
    
@endsection