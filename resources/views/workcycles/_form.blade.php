            <div class="box-body">
              <div class="form-group {{ $errors->has('tanggal') ? 'has-error' : '' }}">
                <label>Tanggal</label>
                <div class="row">
                  <div class="col-md-6">
                    {!! Form::text('tanggal', null, ['class' => 'form-control', 'id' => 'datepicker', 'placeholder' => 'Masukan Tanggal', 'readonly' => 'readonly']) !!}
                    @if($errors->has('tanggal'))
                    <span class="help-block">
                        <strong>{{ $errors->first('tanggal') }}</strong>
                    </span>
                    @endif  
                  </div>
                </div>
              </div>
              <div class="form-group {{ $errors->has('keterangan') ? 'has-error' : '' }}">
                <label>Keterangan</label>
                {!! Form::textarea('keterangan', null, ['class' => 'form-control', 'id' => $errors->has('keterangan') ? 'inputError' : '', 'placeholder' => 'Masukan Keterangan']) !!}
                @if($errors->has('keterangan'))
                  <span class="help-block">
                      <strong>{{ $errors->first('keterangan') }}</strong>
                  </span>
                @endif  
              </div>
            </div>
            <!-- /.box-body -->