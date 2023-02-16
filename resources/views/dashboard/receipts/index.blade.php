@extends('dashboard.layouts.master')

@section('page_title','receipts')

@section ('content')
<div class="card card-info">
<div class="card-header">
  <form action="{{route('receipts.index')}}" method="GET" style="float:left ;">
    <div class="input-group">
      <input type="search" name="search" placeholder="vui lòng nhập loại....." value="{{ old('search',$search) }}">
      <div class="input-group-append">
        <button type="submit" class="btn btn-default"><i class="fas fa-search"> Tìm kiếm</i></button>
      </div>
    </div>
  </form>
  <a class="btn btn-primary float-right" href="{{ route('receipts.create') }}"><i class="fa fa-plus-square"> Đăng kí</i></a>
  </div>
  <div class="card-body">
    <table class="table">
      <thead>
        <tr>
          <th>STT</th>
          <th>Nhân Viên</th>
          <th>Số Tiền</th>
          <th>Loại</th>
          <th>Nội dung</th>
          <th>Ngày tạo</th>
          <th colspan="3"></th>
        </tr>
      </thead>
      <tbody>
        <tr>
          @foreach ($receipts as $key => $receipt)
          <td>{{ $key+1 }}</td>
          <td>{{ $receipt->employee->name ?? 'None'}}</td>
          <td>{{ number_format($receipt->price) }}  vnđ</td>
          <td>{{ $receipt->type }}</td>
          <td>{{ $receipt->content  }}</td>
          <td>{{ $receipt->day }}</td>
          <td><a href="{{ route('receipts.edit',['id' =>$receipt->id]) }}"><i class="fas fa-edit"> Cập nhật</i></a></td>
          <td>
            <form action="{{ route('receipts.destroy', ['id' =>$receipt->id]) }}" method="POST">
              @csrf
              @method('DELETE')

              <button type="submit"  class="btn btn-danger btn-sm"> <i class="fas fa-trash"> Xóa</i></a></button>
            </form>
          </td>
        </tr>
        @endforeach
      </tbody>
    </table>
  </div>
  <div class="float-right">
  <br>
  {{ $receipts->appends(request()->input())->links() }}
</div>
</div>
    @endsection