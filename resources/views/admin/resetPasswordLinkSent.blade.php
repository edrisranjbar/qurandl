@section('title', 'تغییر رمز عبور')
@include('templates.header')
<div class="container mt-5 pt-5">
    <div class="row justify-content-center">
        <div class="col-xl-10 col-lg-12 col-md-9">
            <div class="card shadow o-hidden border-0 shadow-lg my-5">
                <div class="card-body p-0">
                    <div class="row">
                        <div class="col-lg-6 d-none d-lg-block bg-reset-password-link-sent-image"></div>
                        <div class="col-lg-6">
                            <div class="p-5">
                                <div class="text-center">
                                    <img src="{{ url('/') }}/images/tick.svg" style="height:50px;" class="mb-3">
                                    <h1 class="h4 text-gray-900 font-weight-bold mb-4">پیام های خود را چک کنید</h1>
                                    <p class="mb-4">یک ایمیل حاوی لینک بازیابی رمز عبور برایتان ارسال کردیم. با
                                        استفاده از آن، رمز جدیدی تعریف کنید.</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@include('templates.footer')