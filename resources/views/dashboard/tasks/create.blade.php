@extends('dashboard.layouts.master')

@section('page_title','CREATE Task')

@section ('content')
<form action="{{ route('tasks.store') }}" method="post">
    @csrf
    <div class="form-group row">
        <label for="name">Tên công việc:</label>
        <input type="name" value="{{ old('name') }}" class="form-control" id="" placeholder="Enter Name" name="name">
        @if ($errors->has('name'))
        <span class="help-block text-danger"><strong>{{ $errors->first('name') }}</strong></span>
        @endif
    </div>
    <div class="form-group" >
        <label for="employee_id">Tên nhân viên: </label>
        
        <select name="employee_id" class="form-control" >
            @if(!empty($employees))
            @foreach($employees as $key => $value)
            <option value="{{ $key }}" {{ old('employee_id') == $key ? 'selected':'' }}>{{ $value }}</option>
            @endforeach
            @endif
        </select>
    </div>
    <div class="form-group row">
        <label for="daywork">Ngày làm việc:</label>
        <input type="date" value="{{ old('daywork') }}" class="form-control" id="" name="daywork">
        @if ($errors->has('daywork'))
        <span class="help-block text-danger"><strong>{{ $errors->first('daywork') }}</strong></span>
        @endif
    </div>
    <div class="form-group row">
        <label for="content">Nội dung:</label>
        <!-- <input type="content" value="" class="form-control" id="" name="content"> -->
        <textarea rows="4" cols="100" class="form-control" name="content">{{ old('content') }}</textarea>
        @if ($errors->has('content'))
        <span class="help-block text-danger"><strong>{{ $errors->first('content') }}</strong></span>
        @endif
    </div>
    <div class="form-group" >
        <label class="col-sm-2 col-form-label" for="">Trạng thái:</label>
        <div class="form-control clearfix">
        <div class="icheck-primary d-inline">
          <input  type="radio"  name="status" value="ON" checked>
          <label for="status">Đang hoạt động</label>
        </div>
        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;

        <div class="icheck-primary d-inline">
          <input type="radio"  name="status" value="OFF" >
          <label for="status">Nghĩ việc</label><br>
        </div>
        </div>
        @if ($errors->has('status'))
        <span class="help-block text-danger"><strong>{{ $errors->first('status') }}</strong></span>
        @endif
    </div>
    <button type="submit">Submit</button>
</form>

@endsection


