@extends('dashboard.layouts.master')

@section('page_title','logwork')

@section ('content')
<div class="card card-info">
<div class="card-header">
  <form action="{{route('logworks.index')}}" method="GET" style="float:left ;">
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
  <a class="btn btn-primary float-right" href="{{ route('logworks.create') }}"><i class="fa fa-plus-square"> Đăng kí</i></a>
  </div>
  <div class="card-body">
    <table class="table">
      <thead>
        <tr>
          <th>STT</th>
          <th>Nhân Viên</th>
          <th>Số Ngày Làm Việc</th>
          <th>Tháng</th>
          
          <th colspan="3"></th>
        </tr>
      </thead>

      <tbody>
        <tr>
          @foreach ($logworks as $key => $logwork)
          <td>{{ $key+1 }}</td>
          <td>{{ $logwork->employee->name ?? 'None' }} </td>
          <td>{{ $logwork->workingday }} ngày</td>
          <td>{{ $logwork->month }}-{{ $logwork->year }}</td>
          <td><a href="{{ route('logworks.edit',['id' =>$logwork->id]) }}"><i class="fas fa-edit"> Cập nhật</i></a></td>
          <td>
            <form action="{{ route('logworks.destroy', ['id' =>$logwork->id]) }}" method="POST">
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
</div>
</div>
    @endsection