@extends('dashboard.layouts.master')
@section ('content')
<form action="{{ route('logworks.update', ['id' =>$logwork->id]) }}" method="post">
    @csrf
    @method('PUT')
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
        <label for="workingday">Số ngày làm việc::</label>
        <input type="name" value="{{ old('workingday', $logwork->workingday) }}" class="form-control" id="" placeholder="Enter Price" name="workingday">
        @if ($errors->has('workingday'))
        <span class="help-block text-danger"><strong>{{ $errors->first('workingday') }}</strong></span>
        @endif
    </div>

    
    <div class="form-group row">
        <label for="month">Tháng:</label>
        <input type="text" value="{{ old('month', $logwork->month) }}" class="form-control" id="" name="month">
        @if ($errors->has('month'))
        <span class="help-block text-danger"><strong>{{ $errors->first('month') }}</strong></span>
        @endif
    </div>
    <div class="form-group row">
        <label for="year">Năm:</label>
        <input type="text" value="{{ old('year', $logwork->year) }}" class="form-control" id="" name="year">
        @if ($errors->has('year'))
        <span class="help-block text-danger"><strong>{{ $errors->first('month') }}</strong></span>
        @endif
    </div>
    <!-- <div class="form-group">
        <label for="type">Loại:</label>
        <select class="form-control" id="type" name="type">
            <option value="thu" @if (old('type') == "thu") selected: @endif> thu</option>
            <option value="chi" @if (old('type') == "chi") selected: @endif> chi</option>
        </select>
        @if ($errors->has('type'))
        <span class="help-block text-danger"><strong>{{ $errors->first('type') }}</strong></span>
        @endif
    </div> -->
    <button type="submit">Submit</button>
</form>

@endsection


