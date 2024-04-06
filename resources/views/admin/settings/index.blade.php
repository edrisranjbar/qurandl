@extends('layouts.admin')
@section('title','تنظیمات')
@section('content')
<div class="container-fluid">
    <h3 class="h3 mb-3 fw-normal text-right">
        <i class="fa fa-gear ml-1"></i>
        تنظیمات
    </h3>
    <div class="w-100 bg-white rounded shadow-sm border py-5 px-4">
        <form method="POST" action="{{ route('settings.updateAll') }}" class="row" enctype="multipart/form-data">
            @if (session('success'))
            <div class="alert alert-success alert-dismissible d-flex align-items-center fade show" role="alert">
                <i class="bi-check-circle-fill"></i>
                <div>
                    {{ session('success') }}
                </div>
                <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
            </div>
            @endif
            @if (session('error'))
            <div class="alert alert-success alert-dismissible d-flex align-items-center fade show" role="alert">
                {{ session('error') }}
                <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
            </div>
            @endif
            @csrf
            @method('PATCH')
            <div class="row">
                <div class="mb-3 col-6">
                    <label for="website_name" class="form-label">نام وب سایت</label>
                    <input type="text" class="form-control" id="website_name" name="website_name"
                        value="{{ $settings->firstWhere('key', 'website_name')?->value }}" required>
                </div>

                <div class="mb-3 col-6">
                    <label for="website_description" class="form-label">توضیحات وب سایت</label>
                    <input type="text" class="form-control" id="website_description" name="website_description"
                        value="{{ $settings->firstWhere('key', 'website_description')?->value }}" required>
                </div>
            </div>
            <div class="row">
                <div class="mb-3 col-6">
                    <label for="logo" class="form-label">لوگو</label>
                    <input type="file" class="form-control" id="logo" name="logo"
                        value="{{ $settings->firstWhere('key', 'logo')?->value }}" accept="image/">
                    @if ($settings->firstWhere('key', 'logo')?->value)
                    <div class="mt-2">
                        <label class="form-label">تصویر فعلی:</label>
                        <img src="{{ asset('storage/upload/'.$settings->firstWhere('key', 'logo')?->value) }}"
                            class="img-fluid rounded">
                    </div>
                    @endif
                </div>
            </div>
            <div class="w-100 d-flex justify-content-start mt-3">
                <button type="submit" class="btn btn-w-icon btn-primary">
                    <i class="fa fa-save ml-1"></i>
                    ذخیره تنظیمات
                </button>
            </div>
        </form>
    </div>
    <!-- Reset Modal -->
    <div class="modal fade" id="resetModal" tabindex="-1" aria-labelledby="resetModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="resetModalLabel">تایید بازگردانی پایگاه داده به حالت اولیه</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="بستن"></button>
                </div>
                <div class="modal-body">
                    <p>آیا مطمئن هستید که میخواهید دیتابیس را ریست کنید؟</p>
                </div>
                <div class="modal-footer d-flex justify-content-start">
                    <a href="{{ url('resetDatabase') }}" class="btn btn-danger">بله، ریست کن!</a>
                    <button type="button" class="btn btn-outline-secondary" data-bs-dismiss="modal">نه، برگرد</button>
                </div>
            </div>
        </div>
    </div>
    @stop