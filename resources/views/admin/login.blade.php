@section('title', 'ورود')
@extends('layouts.login')
@section('content')
    <div class="login_card card o-hidden border-0 shadow-lg my-5 mx-auto rounded">
        <div class="card-body p-0">
            <div class="col-lg-12">
                <div class="p-5">
                    <div class="text-center">
                        <h1 class="font-weight-bold h2 text-gray-900 mb-5 mt-2">ورود مدیران</h1>
                        @if (isset($message))
                            <div class="alert alert-success">{{ $message }}</div>
                        @endif
                    </div>
                    @if ($errors->any())
                        @foreach ($errors->all() as $error)
                            <div class="alert alert-danger mb-2">{{ $error }}</div>
                        @endforeach
                    @endif
                    <form class="user needs-validation" name="login-form" method="post" action="{{ url('admin/login') }}"
                        novalidate>
                        @csrf
                        <div class="form-group">
                            <input name="username" class="form-control form-control-user" value="{{ old('username') }}"
                                placeholder="نام کاربری" required>
                            <div class="invalid-feedback text-right">
                                لطفا نام کاربری معتبری وارد کنید
                            </div>
                        </div>
                        <div class="form-group">
                            <input type="password" name="password" class="form-control form-control-user"
                                placeholder="رمز عبور" minlength="4" required>
                            <div class="invalid-feedback text-right mb-4">
                                لطفا رمز عبور معتبری وارد کنید
                            </div>

                        </div>
                        <input class="btn btn-primary btn-user btn-block g-recaptcha" data-sitekey="reCAPTCHA_site_key"
                            data-callback='onSubmit' type="submit" name="login-btn" value="ورود">
                    </form>
                </div>
            </div>
        </div>
    </div>
@stop

<script src="{{ asset('assets\js\login.js') }}" defer></script>
