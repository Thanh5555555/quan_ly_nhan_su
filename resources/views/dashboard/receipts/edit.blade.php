@extends('dashboard.layouts.master')
@section ('content')
<form action="{{ route('receipts.update', ['id' =>$receipt->id]) }}" method="post">
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
        <label for="price">Số tiền:</label>
        <input type="name" value="{{ old('price', $receipt->price) }}" class="form-control" id="" placeholder="Enter Price" name="price">
        @if ($errors->has('price'))
        <span class="help-block text-danger"><strong>{{ $errors->first('price') }}</strong></span>
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


    <div class="form-group">
        <label for="type">Loại:</label>
        <select class="form-control" id="type" name="type">
            <option value="thu" {{ old('type',$receipt->type)=='thu' ? 'selected' : ''  }}> thu</option>
            <option value="chi" {{ old('type',$receipt->type)=='chi' ? 'selected' : ''  }}> chi</option>
        </select>
        @if ($errors->has('type'))
        <span class="help-block text-danger"><strong>{{ $errors->first('type') }}</strong></span>
        @endif
    </div>



    <div class="form-group row">
        <label for="content">Nội dung:</label>
        <textarea rows="4" cols="100"  class="form-control" name="content">{{ old('content', $receipt->content) }}</textarea>
        @if ($errors->has('content'))
        <span class="help-block text-danger"><strong>{{ $errors->first('content') }}</strong></span>
        @endif
    </div>
    <div class="form-group row">
        <label for="day">Ngày làm việc:</label>
        <input type="date" value="{{ old('day', $receipt->day) }}" class="form-control" id="" name="day">
        @if ($errors->has('day'))
        <span class="help-block text-danger"><strong>{{ $errors->first('day') }}</strong></span>
        @endif
    </div>
    <button type="submit">Submit</button>
</form>

@endsection


