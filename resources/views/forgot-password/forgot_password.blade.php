@extends('layouts.admin-login')

@section('content')
    <form class="login100-form validate-form" method="POST" action="{{ route('forgot-password-post') }}">
        @csrf
        <span class="login100-form-title p-b-49">
            ADMIN
        </span>

        @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <div class="wrap-input100 validate-input m-b-23" data-validate = "Vui lòng nhập email.">
            <span class="label-input100">Email</span>
            <input class="input100" type="email" name="email" placeholder="Email" value="{{ old('email') }}">
            <span class="focus-input100" data-symbol="&#xf206;"></span>
        </div>

        <div class="container-login100-form-btn">
            <div class="wrap-login100-form-btn">
                <div class="login100-form-bgbtn"></div>
                <button class="login100-form-btn">
                    Submit
                </button>
            </div>
        </div>

    </form>
@endsection
