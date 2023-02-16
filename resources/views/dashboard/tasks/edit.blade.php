@extends('dashboard.layouts.master')
@section ('content')
<form action="{{ route('tasks.update', ['id' =>$task->id]) }}" method="post">
    @csrf
    @method('PUT')
    <div class="form-group row">
        <label for="name">Tên công việc:</label>
        <input type="name"  class="form-control" id="" value="{{ old('name', $task->name) }}" name="name">
        @if ($errors->has('name'))
        <span class="help-block text-danger"><strong>{{ $errors->first('name') }}</strong></span>
        @endif
    </div>
    <div class="form-group row">
        <label for="employee_id">Tên nhân viên: </label>
        <select name="employee_id" class="form-control" id="">
            @if(!empty($employees))
            @foreach($employees as $key => $value)
            <option value="{{ $key }}" {{ old('employee_id', $task->employee_id) == $key ? 'selected':'' }}>{{ $value }}</option>
           @endforeach
            @endif
        </select>
    </div>
    <div class="form-group row">
        <label for="daywork">Ngày làm việc:</label>
        <input type="date" class="form-control" id="" value="{{ old('daywork', $task->daywork) }}" name="daywork">
        @if ($errors->has('daywork'))
        <span class="help-block text-danger"><strong>{{ $errors->first('daywork') }}</strong></span>
        @endif
    </div>
    <div class="form-group row">
        <label for="content">Nội dung:</label>
        <textarea rows="4" cols="100"  class="form-control" name="content">{{ old('content', $task->content) }}</textarea>
        @if ($errors->has('content'))
        <span class="help-block text-danger"><strong>{{ $errors->first('content') }}</strong></span>
        @endif
    </div>
    <div class="form-group">
        <label for="">Trạng thái:</label>
        <br>

          <input type="radio" id="status"  name="status" value="ON" @if( old('status', $task->status) == 'ON') checked @endif>
          <label for="status">Đang hoạt động</label><br>
          <input type="radio" id="status"   name="status" value="OFF" @if( old('status', $task->status) == 'OFF') checked @endif>
          <label for="status">Nghĩ việc</label><br>
    </div>
    <button type="submit">Submit</button>
</form>

@endsection


