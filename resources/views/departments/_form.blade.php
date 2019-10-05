            <div class="box-body">
              <div class="form-group {{ $errors->has('department_id') ? 'has-error' : '' }}">
                <label>ID Department</label>
                {!! Form::text('department_id', null, ['class' => 'form-control', 'id' => $errors->has('department_id') ? 'inputError' : '', 'placeholder' => 'Masukan ID Department']) !!}
                @if($errors->has('department_id'))
                  <span class="help-block">
                      <strong>{{ $errors->first('department_id') }}</strong>
                  </span>
                @endif  
              </div>
              <div class="form-group {{ $errors->has('name') ? 'has-error' : '' }}">
                <label>Name</label>
                {!! Form::text('name', null, ['class' => 'form-control', 'id' => $errors->has('name') ? 'inputError' : '', 'placeholder' => 'Masukan Name']) !!}
                @if($errors->has('name'))
                  <span class="help-block">
                      <strong>{{ $errors->first('name') }}</strong>
                  </span>
                @endif  
              </div>
            </div>
            <!-- /.box-body -->