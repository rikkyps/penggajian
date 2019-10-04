{!! Form::model($model, ['url' => $delete_url, 'method' => 'DELETE']) !!}
<div class="btn-btn-group">
  <a href="{{ $show_url }}" class="btn btn-primary"> Show</a>
  <a href="{{ $edit_url }}" class="btn btn-success"> Edit</a>
  <button type="submit" class="btn btn-danger" onclick="return comfirm('Are you sure want to delete this item?');">Delete</button>
</div>
{!! Form::close() !!}