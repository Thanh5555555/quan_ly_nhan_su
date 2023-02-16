@extends('dashboard.layouts.master')

@section('page_title','EMPLOYEES')

@section ('content')
<div class="card card-info">
<div class="card-header">
  <form action="{{route('salaries.index')}}" method="GET" style="float: left;">
    <div class="input-group">
    <select name="month" class="form-control" >
            @if(!empty($search))
            @foreach($search as $key => $value)
            <option value="{{ $value }}" {{ old('month') == $key ? 'selected':'' }}>{{ $value }}</option>
            @endforeach
            @endif
        </select>
        <button type="submit" class="btn btn-default"><i class="fas fa-search"> Tìm kiếm</i></button>
    </div>
    
  </form>
</div>


{{-- show error message --}}
<!-- @if(Session::has('error'))
<p class="text-danger">{{ Session::get('error') }}</p>
@endif -->
<table class="table">
  <thead>
    <tr>
      <th>STT</th>
      <th>Name</th>
      <th>lương</th>
      <th>số ngày làm việc</th>
      <th>lương thực nhận</th>
      <th>Tháng</th>
    </tr>
  </thead>
  <tbody>
        <tr>
          @foreach ($salaries as $key => $salary)
          <td>{{ $key+1 }}</td>
          <td>{{ $salary['nhanvien'] }}</td>
          <td>{{ number_format($salary['luong'])}} vnđ</td>
          <td>{{ $salary['ngaylamviec'] }}</td>
          <td>{{ number_format(round($salary['realSalary'])) }}</td>
          <td>{{ $salary['thang'] }}-{{ $salary['nam'] }}</td>
        </tr>
        @endforeach
      </tbody>
</table>
</div>
@endsection