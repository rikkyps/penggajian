@extends('layouts.admin.app')

@section('titlebar', 'Aplikasi Penggajian | Index Data Setting')

@section('content')
  <section class="content-header">
    <h1>
      Setting /<small>Show</small>
    </h1>
    <ol class="breadcrumb">
      <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
      <li><a href="#">Layout</a></li>
      <li class="active">Top Navigation</li>
    </ol>
  </section>

  <section class="content">
    <div class="box box-default">
      <div class="box-header with-border">
        <h3 class="box-title">Data Setting</h3>
      </div>
      <div class="row">
        <div class="col-md-6">
          <div class="box-body">
            {!! Form::model($settings, ['route' => 'settings.store', 'method' => 'POST']) !!}
              <div class="nav-tabs-custom">
                <ul class="nav nav-tabs">
                    <li class="active"><a href="#activity" data-toggle="tab">Company Name</a></li>
                    <li><a href="#timeline" data-toggle="tab">Contact</a></li>
                </ul>
                <div class="tab-content">
                  <div class="active tab-pane" id="activity">
                  <!-- TAB 1 -->
                      <div class="form-horizontal">
                          <div class="form-group {{ $errors->has('company_name') ? 'has-error' : '' }}">
                              <label for="inputName" class="col-sm-2 control-label">Company Name</label>
                              <div class="col-sm-10">
                                  {!! Form::text('company_name', null, ['class' => 'form-control', 'id' => $errors->has('company_name') ? 'inputError' : '']) !!}
                                  @if ($errors->has('company_name'))
                                      <span class="help-block">
                                          <strong>{{ $errors->first('company_name') }}</strong>
                                      </span>
                                  @endif
                              </div>
                          </div>
                          <div class="form-group {{ $errors->has('photo') ? 'has-error' : '' }}">
                            <label for="inputName" class="col-sm-2 control-label">Logo</label>
                            <div class="col-sm-10">
                              {!! Form::text('logo', null, ['id' => 'logo', 'class' => 'form-control', 'readonly']) !!}
                              <br>
                              <a id="lfm" data-input="logo" data-preview="holder" class="btn btn-primary text-white">
                                  <i class="fa fa-cloud-upload"></i> Choose
                              </a>
                              <hr>
                              <img id="holder" style="margin-top:15px;max-height:254px;max-width: 152px;">
                            </div>
                          </div>
                      </div>
                  </div>
                  <!-- tab-pane -->
                  <div class="tab-pane" id="timeline">
                  <!-- TAB 2 -->
                      <div class="form-horizontal">
                          <div class="form-group {{ $errors->has('email') ? 'has-error' : '' }}">
                              <label for="inputName" class="col-sm-2 control-label">Email</label>
                              <div class="col-sm-10">
                                  {!! Form::text('email', null, ['class' => 'form-control', 'id' => $errors->has('email') ? 'inputError' : '']) !!}
                                  @if ($errors->has('email'))
                                      <span class="help-block">
                                          <strong>{{ $errors->first('email') }}</strong>
                                      </span>
                                  @endif
                              </div>
                          </div>
                          <div class="form-group {{ $errors->has('phone') ? 'has-error' : '' }}">
                              <label for="inputName" class="col-sm-2 control-label">Phone</label>
                              <div class="col-sm-10">
                                  {!! Form::text('phone', null, ['class' => 'form-control', 'id' => $errors->has('phone') ? 'inputError' : '']) !!}
                                  @if ($errors->has('phone'))
                                      <span class="help-block">
                                          <strong>{{ $errors->first('phone') }}</strong>
                                      </span>
                                  @endif
                              </div>
                          </div>
                          <div class="form-group {{ $errors->has('address') ? 'has-error' : '' }}">
                              <label for="inputName" class="col-sm-2 control-label">Address</label>
                              <div class="col-sm-10">
                                  {!! Form::textarea('address', null, ['class' => 'form-control', 'id' => $errors->has('address') ? 'inputError' : '']) !!}
                                  @if ($errors->has('address'))
                                      <span class="help-block">
                                          <strong>{{ $errors->first('address') }}</strong>
                                      </span>
                                  @endif
                              </div>
                          </div>
                      </div>
                  </div>
                  <div class="form-group">             
                      <button type="submit" class="btn btn-primary">Submit</button>
                  </div>
                </div>
              </div>
            {!! Form::close() !!}
          </div>
        </div>
        <div class="col-md-6">
        <br>
        <br>
          <img src="{{ asset($settings->logo) }}" alt="" width="200">
        </div>
      </div>

    </div>
  </section>     
@endsection

@section('assets-bottom')
<script src="{{ asset('vendor/laravel-filemanager/js/lfm.js') }}"></script>
<script>
  $('#lfm').filemanager('image');
</script>
@endsection