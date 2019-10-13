@extends('layouts.admin.app')

@section('titlebar', 'Aplikasi Penggajian | Tambah Data Karyawan')

@section('assets-top')
<!-- bootstrap datepicker -->
<link rel="stylesheet" href="{{ asset('assets/bower_components/bootstrap-datepicker/dist/css/bootstrap-datepicker.min.css') }}">
@endsection

@section('content')
  <section class="content-header">
    <h1>
      Karyawan /<small>Tambah Data</small>
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
          {!! Form::open(['route' => 'karyawans.store', 'method' => "POST"]) !!}
            @include('karyawans._form')
            <div class="box-footer">
              <button type="submit" class="btn btn-primary">Submit</button>
              <a href="{{ route('karyawans.index') }}" class="btn btn-default">Back</a>
            </div>
          {!! Form::close() !!}
        </div>
        <!-- /.box -->
      </div>
    </div>
  </div>
@endsection

@section('assets-bottom')
<!-- bootstrap datepicker -->
<script src="{{asset('assets/bower_components/bootstrap-datepicker/dist/js/bootstrap-datepicker.min.js')}}"></script>
<script src="{{ asset('vendor/laravel-filemanager/js/lfm.js') }}"></script>
<script>
//Script Datepicker
  $('#datepicker').datepicker({
      autoclose: true
  })

  $('#datepicker2').datepicker({
      autoclose: true
  })

  $('#lfm').filemanager('image');
</script>
    
@endsection