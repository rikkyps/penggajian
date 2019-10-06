            <div class="box-body">
              <div class="form-group {{ $errors->has('name') ? 'has-error' : '' }}">
                <label>Nama Position</label>
                {!! Form::text('name', null, ['class' => 'form-control', 'id' => $errors->has('name') ? 'inputError' : '', 'placeholder' => 'Masukan Nama Position']) !!}
                @if($errors->has('name'))
                  <span class="help-block">
                      <strong>{{ $errors->first('name') }}</strong>
                  </span>
                @endif  
              </div>
              <div class="form-group {{ $errors->has('tunjangan') ? 'has-error' : '' }}">
                <label>Nominal Tunjangan</label>
                {!! Form::text('tunjangan', null, ['class' => 'form-control', 'id' => $errors->has('tunjangan') ? 'inputError' : '', 'placeholder' => 'Masukan Nominal Tunjangan']) !!}
                @if($errors->has('tunjangan'))
                  <span class="help-block">
                      <strong>{{ $errors->first('tunjangan') }}</strong>
                  </span>
                @endif  
              </div>
            </div>
            <!-- /.box-body -->