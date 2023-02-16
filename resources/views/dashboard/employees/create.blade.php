@extends('dashboard.layouts.master')

@section('page_title','CREATE Employee')

@section ('content')
<form action="{{ route('employees.store') }}" method="post">
    @csrf
    <div class="form-group">
        <label for="name">Tên nhân viên:</label>
        <input type="name" value="{{ old('name') }}" class="form-control" id="" placeholder="Enter Name" name="name">
        @if ($errors->has('name'))
        <span class="help-block text-danger"><strong>{{ $errors->first('name') }}</strong></span>
        @endif
    </div>
    <div class="form-group">
        <label for="email">Email:</label>
        <input type="email" value="{{ old('email') }}" class="form-control" id="" placeholder="Enter Email" name="email">
        @if ($errors->has('email'))
        <span class="help-block text-danger"><strong>{{ $errors->first('email') }}</strong></span>
        @endif
    </div>
    <div class="form-group" >
        <label class="col-sm-2 col-form-label" for="">Giới tính:</label>
        <div class="form-control clearfix">
        <div class="icheck-primary d-inline">
          <input  type="radio"  name="gender" value="1" checked>
          <label for="gender">Nam</label>
        </div>

        <div class="icheck-primary d-inline">
          <input type="radio"  name="gender" value="2" >
          <label for="gender">Nữ</label><br>
        </div>
        </div>

    </div>
    <div class="form-group">
        <label for="salary">lương:</label>
        <input type="salary" value="{{ old('salary') }}" class="form-control" id="" placeholder="Enter salary" name="salary">
        @if ($errors->has('address'))
        <span class="help-block text-danger"><strong>{{ $errors->first('salary') }}</strong></span>
        @endif
    </div>
    <div class="form-group">
        <label for="address">Địa chỉ:</label>
        <input type="address" value="{{ old('address') }}" class="form-control" id="" placeholder="Enter Address" name="address">
        @if ($errors->has('address'))
        <span class="help-block text-danger"><strong>{{ $errors->first('address') }}</strong></span>
        @endif
    </div>
    <div class="form-group">
        <label for="phone">Số  điện thoại:</label>
        <input type="phone" value="{{ old('phone') }}" class="form-control" id="" placeholder="Enter Phone" name="phone">
        @if ($errors->has('phone'))
        <span class="help-block text-danger"><strong>{{ $errors->first('phone') }}</strong></span>
        @endif
    </div>
    <div class="form-group row">
        <label for="start_time">Ngày bắt đầu:</label>
        <input type="date" value="{{ old('start_time') }}" class="form-control" id="" name="start_time">
        @if ($errors->has('start_time'))
        <span class="help-block text-danger"><strong>{{ $errors->first('start_time') }}</strong></span>
        @endif
    </div>
    <button type="submit">Submit</button>
</form>

@endsection