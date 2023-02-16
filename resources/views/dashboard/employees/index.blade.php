@extends('dashboard.layouts.master')

@section('page_title','EMPLOYEES')

@section ('content')
<div class="card card-info">
<div class="card-header">
  <form action="{{route('employees.index')}}" method="GET" style="float: left;">
    <div class="input-group">
      <input type="search" name="search" placeholder="vui lòng nhập....." value="{{ old('search',$search) }}">
      <div class="input-group-append">
        <button type="submit" class="btn btn-default"><i class="fas fa-search"> Tìm kiếm</i></button>
      </div>
    </div>
  </form>
  <a class="btn btn-primary float-right" href="{{ route('employees.create') }}"><i class="fa fa-plus-square"> Đăng kí</i></a>
</div>


{{-- show error message --}}
<!-- @if(Session::has('error'))
<p class="text-danger">{{ Session::get('error') }}</p>
@endif -->
<table class="table">
  <thead>
    <tr>
      <th>STT</th>
      <th>Tên Nhân Viên</th>
      <th>Email</th>
      <th>Địa Chỉ</th>
      <th>Lương</th>
      <th>Số Điện thoại</th>
      <th>Giới Tính</th>
      <th>Ngày Bắt Đầu</th>
      <th colspan="3"></th>
    </tr>
  </thead>
  <tbody>
    <tr>
      @foreach ($employees as $key => $employee)
      <td>{{ $key + 1 }}</td>
      <td>{{ $employee->name }}</td>
      <td>{{ $employee->email }}</td>
      <td>{{ $employee->address }}</td>
      <td>{{ number_format($employee->salary) }}  vnđ</td>
      <td>{{ $employee->phone }}</td>
      <td>{{ $employee->gender_object['name'] }}</td>
      <td>{{ $employee->start_time }}</td>
      <td><a href="{{ route('employees.edit',['id' =>$employee->id]) }}"><i class="fas fa-edit"> Cập nhật</i></a></a></td>
      <td>
        <form action="{{ route('employees.destroy', ['id' =>$employee->id]) }}" method="POST">
          @csrf
          @method('DELETE')

          <button type="submit"  class="btn btn-danger btn-sm"> <i class="fas fa-trash"> Xóa</i></a></button>
        </form>
      </td>
    </tr>
    @endforeach
    </tr>
  </tbody>
</table>
<div class="float-right">
  <br>
  {{ $employees->appends(request()->input())->links() }}
</div>
</div>
@endsection
