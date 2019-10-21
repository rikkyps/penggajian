            <div class="box-body">
              <div class="form-group {{ $errors->has('nik') ? 'has-error' : '' }}">
                <label>Nomor Induk Karyawan</label>
                @if (isset($data))
                {!! Form::text('nik', null, ['class' => 'form-control', 'id' => $errors->has('nik') ? 'inputError' : '', 'readonly']) !!}
                @else
                {!! Form::text('nik', null, ['class' => 'form-control', 'id' => $errors->has('nik') ? 'inputError' : '', 'placeholder' => 'Masukan NIK']) !!}
                @endif
                @if($errors->has('nik'))
                  <span class="help-block">
                      <strong>{{ $errors->first('nik') }}</strong>
                  </span>
                @endif  
              </div>
              <div class="form-group {{ $errors->has('name') ? 'has-error' : '' }}">
                <label>Nama Karyawan</label>
                {!! Form::text('name', null, ['class' => 'form-control', 'id' => $errors->has('name') ? 'inputError' : '', 'placeholder' => 'Masukan Nama']) !!}
                @if($errors->has('name'))
                  <span class="help-block">
                      <strong>{{ $errors->first('name') }}</strong>
                  </span>
                @endif  
              </div>
              <div class="form-group {{ $errors->has('born') ? 'has-error' : '' }}">
                <label>Tanggal Lahir</label>
                <div class="row">
                  <div class="col-md-6">
                    {!! Form::text('born', null, ['class' => 'form-control', 'id' => 'datepicker', 'placeholder' => 'Masukan Tanggal Lahir', 'readonly' => 'readonly']) !!}
                    @if($errors->has('born'))
                    <span class="help-block">
                        <strong>{{ $errors->first('born') }}</strong>
                    </span>
                    @endif  
                  </div>
                </div>
              </div>
              <div class="form-group {{ $errors->has('address') ? 'has-error' : '' }}">
                <label>Alamat</label>
                {!! Form::textarea('address', null, ['class' => 'form-control', 'id' => $errors->has('address') ? 'inputError' : '', 'placeholder' => 'Masukan Alamat', 'rows' => 2]) !!}
                @if($errors->has('address'))
                  <span class="help-block">
                      <strong>{{ $errors->first('address') }}</strong>
                  </span>
                @endif  
              </div>
              <div class="form-group {{ $errors->has('status') ? 'has-error' : '' }}">
                <label>Status</label>
                {!! Form::select('status', App\Status::pluck('keterangan', 'id_status')->all(), null, ['class' => 'form-control', 'id' => $errors->has('status') ? 'inputError' : '']) !!}
                @if($errors->has('status'))
                  <span class="help-block">
                      <strong>{{ $errors->first('status') }}</strong>
                  </span>
                @endif  
              </div>
              <div class="form-group {{ $errors->has('gender') ? 'has-error' : '' }}">
              <label>Jenis Kelamin</label>
              <div class="row">
                <div class="col-md-6">
                  {!! Form::select('gender', ['L' => 'Laki-laki', 'P' => 'Perempuan'], null, ['class' => 'form-control', 'id' => $errors->has('gender') ? 'inputError' : '']) !!}
                  @if($errors->has('gender'))
                    <span class="help-block">
                        <strong>{{ $errors->first('gender') }}</strong>
                    </span>
                  @endif
                </div>
              </div> 
              </div>
              <div class="form-group {{ $errors->has('id_department') ? 'has-error' : '' }}">
                <label>Department dan Position</label>
                <div class="row">
                  <div class="col-md-6">
                    {!! Form::select('id_department',  App\Department::pluck('name', 'department_id')->all(), null, ['class' => 'form-control', 'id' => $errors->has('id_department') ? 'inputError' : '']) !!}
                    @if($errors->has('id_department'))
                    <span class="help-block">
                        <strong>{{ $errors->first('id_department') }}</strong>
                    </span>
                    @endif
                  </div>
                  <div class="col-md-6">
                    {!! Form::select('position_id', App\Position::pluck('name', 'id')->all(), null, ['class' => 'form-control', 'id' => $errors->has('position_id') ? 'inputError' : '']) !!}
                    @if($errors->has('position_id'))
                      <span class="help-block">
                          <strong>{{ $errors->first('position_id') }}</strong>
                      </span>
                    @endif   
                  </div>
                </div> 
              </div>
              <div class="form-group {{ $errors->has('since') ? 'has-error' : '' }}">
                <label>Bekerja Sejak</label>
                <div class="row">
                  <div class="col-md-6">
                    {!! Form::text('since', null, ['class' => 'form-control', 'id' => 'datepicker2', 'placeholder' => 'Masukan Sejak Kapan Bekerja', 'readonly' => 'readonly']) !!}
                    @if($errors->has('since'))
                    <span class="help-block">
                        <strong>{{ $errors->first('since') }}</strong>
                    </span>
                    @endif  
                  </div>
                </div>
              </div>
              <div class="form-group {{ $errors->has('phone') ? 'has-error' : '' }}">
                <label>Phone</label>
                <div class="row">
                  <div class="col-md-6">
                    {!! Form::text('phone', null, ['class' => 'form-control', 'id' => $errors->has('phone') ? 'inputError' : '', 'placeholder' => 'Masukan Nomor Phone']) !!}
                    @if($errors->has('phone'))
                    <span class="help-block">
                        <strong>{{ $errors->first('phone') }}</strong>
                    </span>
                    @endif  
                  </div>
                </div>
              </div>
              <div class="form-group {{ $errors->has('photo') ? 'has-error' : '' }}">
                <label>Photo</label>
                  {!! Form::text('photo', null, ['id' => 'photo', 'class' => 'form-control', 'readonly']) !!}
                  <br>
                  <a id="lfm" data-input="photo" data-preview="holder" class="btn btn-primary text-white">
                      <i class="fa fa-cloud-upload"></i> Choose
                  </a>
                  <hr>
                  <img id="holder" style="margin-top:15px;max-height:254px;max-width: 152px;">
              </div>
            </div>
            <!-- /.box-body -->