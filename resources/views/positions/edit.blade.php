@extends('layouts.admin.app')

@section('title', 'Aplikasi Penggajian | Edit Data Position')

@section('content')
  <section class="content-header">
    <h1>
      Position /<small>Edit Data</small>
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
          {!! Form::model($data, ['route' => ['positions.update', $data->id], 'method' => 'PUT']) !!}
          @include('positions._form')
            <div class="box-footer">
              <button type="submit" class="btn btn-primary">Submit</button>
              <a href="{{ route('positions.index') }}" class="btn btn-default">Back</a>
            </div>
          {!! Form::close() !!}
        </div>
        <!-- /.box -->
      </div>
    </div>
  </div>
    
@endsection