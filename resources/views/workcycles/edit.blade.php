@extends('layouts.admin.app')

@section('titlebar', 'Aplikasi Penggajian | Edit Data Worck Cycle')

@section('assets-top')
<!-- bootstrap datepicker -->
<link rel="stylesheet" href="{{ asset('assets/bower_components/bootstrap-datepicker/dist/css/bootstrap-datepicker.min.css') }}">
@endsection

@section('content')
  <section class="content-header">
    <h1>
      Worck Cycle /<small>Edit Data</small>
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
          {!! Form::model($data, ['route' => ['workcycles.update', $data->id], 'method' => 'PUT' ]) !!}
            @include('workcycles._form')
            <div class="box-footer">
              <button type="submit" class="btn btn-primary">Submit</button>
              <a href="{{ route('workcycles.index') }}" class="btn btn-default">Back</a>
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
<script>
//Script Datepicker
  $('#datepicker').datepicker({
      format: ('yyyy-mm-dd'),
      autoclose: true
  })
</script>
    
@endsection