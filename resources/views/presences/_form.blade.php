            <div class="box-body">
              <div class="form-group {{ $errors->has('name') ? 'has-error' : '' }}">
                <label>Nama Karyawan</label>
                <div class="row">
                  <div class="col-md-6">
                    {!! Form::text('name', null, ['list' => 'karyawan', 'class' => 'form-control', 'id' => $errors->has('name') ? 'inputError' : '', 'placeholder' => 'Masukan Nama Karyawan']) !!}
                    @if($errors->has('name'))
                    <span class="help-block">
                        <strong>{{ $errors->first('name') }}</strong>
                    </span>
                    @endif  
                  </div>
                </div>
              </div>
              <div class="form-group {{ $errors->has('tanggal_masuk') ? 'has-error' : '' }}">
                <label>Tanggal Masuk</label>
                <div class="row">
                  <div class="col-md-4">
                    {!! Form::text('tanggal_masuk', null, ['class' => 'form-control', 'id' => 'datepicker', 'placeholder' => 'Masukan Tanggal Masuk', 'readonly' => 'readonly']) !!}
                    @if($errors->has('tanggal_masuk'))
                    <span class="help-block">
                        <strong>{{ $errors->first('tanggal_masuk') }}</strong>
                    </span>
                    @endif  
                  </div>
                  <div class="col-md-4">
                    {!! Form::text('jam_masuk', null, ['class' => 'form-control', 'id' => $errors->has('jam_masuk') ? 'inputError' : '', 'placeholder' => 'Ex : 08:00']) !!}
                      @if($errors->has('jam_masuk'))
                      <span class="help-block">
                          <strong>{{ $errors->first('jam_masuk') }}</strong>
                      </span>
                      @endif
                  </div>
                </div>
              </div>
              <div class="form-group {{ $errors->has('tanggal_pulang') ? 'has-error' : '' }}">
                <label>Tanggal Pulang</label>
                <div class="row">
                  <div class="col-md-4">
                    {!! Form::text('tanggal_pulang', null, ['class' => 'form-control', 'id' => 'datepicker2', 'placeholder' => 'Masukan Tanggal Masuk', 'readonly' => 'readonly']) !!}
                    @if($errors->has('tanggal_pulang'))
                    <span class="help-block">
                        <strong>{{ $errors->first('tanggal_pulang') }}</strong>
                    </span>
                    @endif  
                  </div>
                  <div class="col-md-4">
                    {!! Form::text('jam_pulang', null, ['class' => 'form-control', 'id' => $errors->has('jam_pulang') ? 'inputError' : '', 'placeholder' => 'Ex : 08:00']) !!}
                      @if($errors->has('jam_pulang'))
                      <span class="help-block">
                          <strong>{{ $errors->first('jam_pulang') }}</strong>
                      </span>
                      @endif
                  </div>
                </div>
              </div>
              <div class="form-group {{ $errors->has('status_kehadiran') ? 'has-error' : '' }}">
                <label>Keterangan</label>
                {!! Form::select('status_kehadiran', App\PresenceState::pluck('keterangan', 'kode_kehadiran')->all(), null, ['class' => 'form-control', 'id' => $errors->has('status_kehadiran') ? 'inputError' : '']) !!}
                @if($errors->has('status_kehadiran'))
                  <span class="help-block">
                      <strong>{{ $errors->first('status_kehadiran') }}</strong>
                  </span>
                @endif  
              </div>
            </div>
            <!-- /.box-body -->

            <datalist id="karyawan">
              @foreach(App\Karyawan::pluck('name') as $name)
              <option value="{{ $name }}">
              @endforeach
            </datalist>