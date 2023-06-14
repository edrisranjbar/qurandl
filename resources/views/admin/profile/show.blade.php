@section('title', 'حساب کاربری مدیر')
@include('templates.header')
<div class="container">
    <div class="row">
        <div class="col-12 card p-0">
            <div class="card-header">
                <h1>حساب کاربری مدیریت</h1>
            </div>
            <div class="card-body">
                @if ($errors->any())
                    @foreach($errors->all() as $error)
                        <div class="alert alert-danger mb-2">{{$error}}</div>
                    @endforeach
                @endif
                @if (isset($message))
                    <div class="alert alert-success">{{ $message }}</div>
                @endif
                <form class="row" action="{{ url('admin/managers', $admin) }}" method="POST">
                    @csrf
                    @method('patch')
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="first_name">نام</label>
                            <input class="form-control" id="first_name" name="first_name"
                                   value="{{ $admin->first_name }}">
                        </div>

                        <div class="form-group">
                            <label for="email">ایمیل</label>
                            <input type="email" class="form-control" id="email" name="email"
                                   value="{{ $admin->email }}">
                        </div>

                        <div class="form-group">
                            <label for="password">رمز عبور</label>
                            <input type="password" class="form-control" id="password" name="password">
                        </div>

                        <div class="text-right">
                            <button type="submit" class="btn btn-primary">ویرایش</button>
                        </div>
                    </div>

                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="last_name">نام خانوادگی</label>
                            <input class="form-control" id="last_name" name="last_name"
                                   value="{{ $admin->last_name }}">
                        </div>
                        <div class="form-group">
                            <label for="mobile">موبایل</label>
                            <input class="form-control" id="mobile" name="mobile" value="{{ $admin->mobile }}">
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
</div>
</div>
</div>
@include('templates.footer')