@extends('layouts.admin.app')

@section('titlebar', 'Aplikasi Penggajian | Tambah Data Department')

@section('content')
  <section class="content-header">
    <h1>
      Department /<small>Tambah Data</small>
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
          {!! Form::open(['route' => 'departments.store', 'method' => "POST"]) !!}
            @include('departments._form')
            <div class="box-footer">
              <button type="submit" class="btn btn-primary">Submit</button>
              <a href="{{ route('departments.index') }}" class="btn btn-default">Back</a>
            </div>
          {!! Form::close() !!}
        </div>
        <!-- /.box -->
      </div>
    </div>
  </div>
    
@endsection