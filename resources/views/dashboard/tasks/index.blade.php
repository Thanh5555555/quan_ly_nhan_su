@extends('dashboard.layouts.master')

@section('page_title','Task')

@section ('content')
<div class="card card-info">
  <div class="card-header">
  <form action="{{route('tasks.index')}}" method="GET" style="float:left;">
    <div class="input-group">
      <input type="search" name="search" placeholder="vui lòng nhập....." value="{{ old('search',$search) }}">
      <div class="input-group-append">
        <button type="submit" class="btn btn-default"><i class="fas fa-search"> Tìm kiếm</i></button>
      </div>
    </div>
  </form>
  <a class="btn btn-primary float-right" href="{{ route('tasks.create') }}"><i class="fa fa-plus-square"> Đăng kí</i></a>
  </div>
  <div class="card-body">
  <table class="table">
    <thead>
      <tr>
        <th>STT</th>
        <th>Tên công việc</th>
        <th>Nhân viên</th>
        <th>Ngày làm việc</th>
        <th>Nội dung công việc</th>
        <th>Trạng thái</th>
        <th colspan="3"></th>
      </tr>
    </thead>
    <tbody>
      <tr>
        @foreach ($tasks as $key => $task)
        <td>{{ ++$key }}</td>
        <td>{{ $task->name }}</td>
        <td>{{ $task->employee->name ?? 'None'}}</td>
        <td>{{ $task->daywork }}</td>
        <td>{{ $task->content }}</td>
        <td>{{ $task->status  }}</td>
        <td><a href="{{ route('tasks.edit',['id' =>$task->id]) }}"><i class="fas fa-edit"> Cập nhật</i></a></a></td>
        <td>
          <form action="{{ route('tasks.destroy', ['id' =>$task->id]) }}" method="POST">
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
  <div class="float-right">
  <br>
  {{ $tasks->appends(request()->input())->links() }}
</div>
</div>
@endsection