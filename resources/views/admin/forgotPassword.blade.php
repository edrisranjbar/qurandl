@section('title', 'فراموشی رمز عبور')
@include('templates.header')
<div class="container mt-5 pt-3">
    <!-- Outer Row -->
    <div class="row justify-content-center">
        <div class="col-xl-10 col-lg-12 col-md-9 px-5">
            <div class="card o-hidden border-0 shadow-lg my-5">
                <div class="card-body p-0">
                    <div class="p-5">
                        <div class="text-right">
                            @if ($errors->any())
                                @foreach($errors->all() as $error)
                                    <div class="alert alert-danger mb-2">{{$error}}</div>
                                @endforeach
                            @endif
                        </div>
                        <div>
                            <h1 class="h4 font-weight-bold text-gray-900 mb-3 text-center">رمز عبورتان را فراموش کرده
                                اید؟</h1>
                            <p class="mb-4">ایمیل خود را وارد کنید تا کد بازیابی برای شما ارسال بشه.</p>
                        </div>
                        <form class="user" action="{{ url('admin/login/forgotPassword') }}" method="post">
                            @csrf
                            <div class="form-group">
                                <label for="email">ایمیل:</label>
                                <input name="email" id="email" type="email" value="{{ old('email') }}" class="form-control form-control-user">
                            </div>
                            <input type="submit" name="forgot-password-process-submit"
                                   class="btn btn-primary btn-user btn-block" value="بازیابی رمز عبور">
                        </form>
                        <hr>
                        <div class="text-center">
                            <a class="small" href="{{ url('admin/login') }}">حساب کاربری دارید؟ وارد شوید.</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@include('templates.footer')