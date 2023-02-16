@extends('dashboard.layouts.master')
@section ('content')
    <div class="container"> 


 
<form action="{{ route('employees.update', ['id' =>$employee->id]) }}" method="POST">
    @csrf
    @method('PUT')
    <div class="form-group">
        <label for="name">Name</label>
        <input class="form-control" name="name" value="{{ old('name', $employee->name) }}">
        @if ($errors->has('name'))
        <span class="help-block text-danger"><strong>{{ $errors->first('name') }}</strong></span>
        @endif
    </div>
    <div class="form-group">
        <label for="email">Email</label>
        <input class="form-control" name="email" value="{{ old('email', $employee->email) }}">
        @if ($errors->has('email'))
        <span class="help-block text-danger"><strong>{{ $errors->first('email') }}</strong></span>
        @endif
    </div>
    

    <div class="form-group">
        <label for="">Giới Tính:</label>
        <br>

          <input type="radio" id="gender"  name="gender" value="1" @if( old('gender', $employee->gender) == '1') checked @endif>
          <label for="gender">Nam</label><br>
          <input type="radio" id="gender"   name="gender" value="2" @if( old('gender', $employee->gender) == '2') checked @endif>
          <label for="gender">Nữ</label><br>
    </div>


    <div class="form-group">
        <label for="password">Address</label>
        <input class="form-control" name="address" value="{{ old('address', $employee->address) }}">
        @if ($errors->has('address'))
        <span class="help-block text-danger"><strong>{{ $errors->first('address') }}</strong></span>
        @endif
    </div>
    <div class="form-group">
        <label for="salary">Salary:</label>
        <input type="salary" value="{{ old('salary', $employee->salary) }}" class="form-control" id="" placeholder="Enter salary" name="salary">
        @if ($errors->has('salary'))
        <span class="help-block text-danger"><strong>{{ $errors->first('salary') }}</strong></span>
        @endif
    </div>
    <div class="form-group">
        <label  for="phone">Phone</label>
        <input  class="form-control" name="phone" value="{{ old('phone', $employee->phone) }}">
        @if ($errors->has('phone'))
        <span class="help-block text-danger"><strong>{{ $errors->first('phone') }}</strong></span>
        @endif
    </div>

    <div class="form-group row">
        <label for="start_time">Ngày bắt đầu:</label>
        <input type="date" value="{{ old('start_time', $employee->start_time) }}" class="form-control" id="" name="start_time">
        @if ($errors->has('start_time'))
        <span class="help-block text-danger"><strong>{{ $errors->first('start_time') }}</strong></span>
        @endif
    </div>

    <input type="hidden" name="employee_id" value="{{ $employee->id }}">
    <button type="submit">Submit</button>
</form>
</div>

@endsection