@extends('layouts.admin.app')

@section('title', 'Aplikasi Penggajian | Index Position')

@section('assets-top')
  <link rel="stylesheet" href="{{ asset('assets/bower_components/datatables.net-bs/css/dataTables.bootstrap.min.css')}} ">
@endsection

@section('content')
  <section class="content-header">
    <h1>
      Position /<small>Index</small>
    </h1>
    <ol class="breadcrumb">
      <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
      <li><a href="#">Layout</a></li>
      <li class="active">Top Navigation</li>
    </ol>
  </section>

  <!-- Main content -->
  <section class="content">
    <div class="box box-default">
      <div class="box-header with-border">
        <h3 class="box-title">Data Position</h3>
      </div>
      <div class="box-body">
        <a href="{{ route('positions.create') }}"><button class="btn btn-primary">Tambah Data</button></a>
        <hr>
        <table id="dataTable" class="table table-bordered table-striped">
          <thead>
            <tr>
              <th>ID Position</th>
              <th>Name</th>
              <th>Tunjangan</th>
              <th>Action</th>
            </tr>
          </thead>
          <tbody>
          </tbody>
          <tfoot>
            <tr>
              <th>ID Position</th>
              <th>Name</th>
              <th>Tunjangan</th>
              <th>Action</th>
            </tr>
          </tfoot>
        </table>
      </div>
      <!-- /.box-body -->
    </div>
    <!-- /.box -->
  </section>
  <!-- /.content -->
@endsection

@section('assets-bottom')
  <script src="{{ asset('assets/bower_components/datatables.net/js/jquery.dataTables.min.js') }}"></script>
  <script src="{{ asset('assets/bower_components/datatables.net-bs/js/dataTables.bootstrap.min.js') }}"></script>
  <script>
  $(document).ready(function(){
    $("#dataTable").DataTable({
      processing: true,
      serverside: true,
      ajax: "{{ route('api.datatable.positions') }}",
      columns: [
        {data: 'id', name: 'id'},
        {data: 'name', name: 'name'},
        {data: 'nominal_tunjangan', name: 'nominal_tunjangan'},
        {data: 'action', name: 'action', orderable: false, searchable: false}
      ]
    })
  });
  </script>
 @endsection