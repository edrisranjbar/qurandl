@section('title', 'ورود')
@include('templates.header')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-lg-5 card o-hidden border-0 shadow-lg my-5">
            <div class="card-body p-0">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="p-5">
                            <div class="text-center">
                                <h1 class="font-weight-bold h4 text-gray-900 mb-4">ورود مدیران</h1>
                                @if (isset($message))
                                <div class="alert alert-success">{{ $message }}</div>
                                @endif
                            </div>
                            @if ($errors->any())
                            @foreach($errors->all() as $error)
                            <div class="alert alert-danger mb-2">{{$error}}</div>
                            @endforeach
                            @endif
                            <form class="user" name="login-form" method="post" action="{{ url('admin/login') }}">
                                @csrf
                                <div class="form-group">
                                    <input type="email" name="email" class="form-control form-control-user"
                                        placeholder="نشانی ایمیل" value="{{ old('email') }}">
                                </div>
                                <div class="form-group">
                                    <input type="password" name="password" minlength="3"
                                        class="form-control form-control-user" placeholder="رمز عبور">
                                </div>
                                <div class="form-group">
                                    <div class="custom-control custom-checkbox text-right">
                                        <label class="custom-control-label" for="remember">من را به یاد داشته
                                            باش</label>
                                        <input type="checkbox" class="form-check" id="remember" name="remember">
                                    </div>
                                </div>
                                <input class="btn btn-primary btn-user btn-block g-recaptcha"
                                    data-sitekey="reCAPTCHA_site_key" data-callback='onSubmit' type="submit"
                                    name="login-btn" value="ورود">
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>

</div>
@include('templates.footer')