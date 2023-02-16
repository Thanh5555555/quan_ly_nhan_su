@extends('dashboard.layouts.master')

@section('page_title','EMPLOYEES')

@section ('content')

<div class="card-header">
  <form action="{{route('reports.index')}}" method="GET" style="margin: 10px;">
    <div class="input-group">
      <input type="date" name="search" class="form-control" value="{{ old('search',$search) }}">
      <div class="input-group-append">
        <button type="submit" class="btn btn-default"><i class="fas fa-search"> Tìm kiếm</i></button>
      </div>
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
      <th>Ngày</th>
      <th>Tổng Thu</th>
      <th>Tổng Chi</th>
    </tr>
  </thead>
  <tbody>
    <tr>
      @foreach ($revenues as $key => $revenue)
      <td>{{ ++$key }}</td>
      <td>{{ $revenue->day }}</td>
      <td>{{  number_format($revenue->sum_thu) }}  vnđ</td>
      <td>{{  number_format($revenue->sum_chi) }}  vnđ</td>
    </tr>
    @endforeach
  </tbody>
</table>

@endsection