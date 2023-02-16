@extends('dashboard.layouts.master')

@section('page_title','CREATE Receipt')

@section ('content')
<form action="{{ route('logworks.store') }}" method="post">
    @csrf
    <div class="form-group">
        <label for="employee_id">Nhân viên: </label>
        <select name="employee_id" class="form-control">
            @if(!empty($employees))
            @foreach($employees as $key => $value)
            <option value="{{ $key }}" {{ old('employee_id') == $key ? 'selected':'' }}>{{ $value }}</option>
            @endforeach
            @endif
        </select>
    </div>
    <div class="form-group row">
        <label for="workingday">Số ngày làm việc:</label>
        <input type="name" value="{{ old('workingday') }}" class="form-control" id="" placeholder="Enter logworks" name="workingday">
        @if ($errors->has('workingday'))
        <span class="help-block text-danger"><strong>{{ $errors->first('workingday') }}</strong></span>
        @endif
    </div>
    <div class="form-group row">
        <label for="month">Tháng:</label>
        <input type="text" value="{{ old('month') }}" class="form-control" id="" name="month">
        @if ($errors->has('month'))
        <span class="help-block text-danger"><strong>{{ $errors->first('month') }}</strong></span>
        @endif
    </div>
    <div class="form-group row">
        <label for="year">Năm:</label>
        <input type="text" value="{{ old('year') }}" class="form-control" id="" name="year">
        @if ($errors->has('year'))
        <span class="help-block text-danger"><strong>{{ $errors->first('month') }}</strong></span>
        @endif
    </div>
    <button type="submit">Submit</button>
</form>

@endsection