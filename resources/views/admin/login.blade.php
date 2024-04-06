@section('title', 'ورود')
@extends('layouts.login')
@section('content')
<section class="vh-100 bg-gradient-info">
    <div class="container py-5 h-100">
        <div class="row d-flex justify-content-center align-items-center h-100">
            <div class="col col-xl-10">
                <div class="card rounded-4 w-75 mx-auto">
                    <div class="card-body px-4 px-lg-5 text-black">
                        @if (session('success'))
                            <div class="alert alert-success alert-dismissible d-flex align-items-center fade show"
                                 role="alert">
                                <i class="bi-check-circle-fill"></i>
                                <div>
                                    {{ session('success') }}
                                </div>
                                <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
                            </div>
                        @endif
                        <form method="post" action="{{ url('admin/login') }}" class="needs-validation"
                              novalidate>
                            @csrf
                            <h1 class="h3 mb-4 fw-normal text-center">
                                لطفا وارد شوید
                            </h1>
                            @if (session('error'))
                                <div class="alert alert-danger alert-dismissible d-flex align-items-center fade show"
                                     role="alert">
                                    {{ session('error') }}
                                </div>
                            @endif
                            <div class="form-group">
                                <label for="username" class="float-right">نام کاربری</label>
                                <input name="username" type="username" class="form-control" id="username"
                                       placeholder="نام کاربری" value="{{ old('username') }}" required>
                                <div class="invalid-feedback text-right">
                                    لطفا نام کاربری معتبری وارد کنید
                                </div>
                                @error('username')
                                <p class="text-danger">{{ $message }}</p>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="password" class="float-right">رمز عبور</label>
                                <input name="password" type="password" class="form-control" id="password"
                                       placeholder="رمز عبور" required>
                                <div class="invalid-feedback text-right mb-4">
                                    لطفا رمز عبور معتبری وارد کنید
                                </div>
                                @error('password')
                                <p class="text-danger">{{ $message }}</p>
                                @enderror
                            </div>
                            <button class="w-100 btn btn-lg btn-primary" type="submit">
                                ورود
                            </button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
@stop

<script src="{{ asset('assets\js\login.js') }}" defer></script>