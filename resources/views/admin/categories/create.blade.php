@section('title', 'ایجاد دسته‌بندی جدید')
@extends('layouts.admin')
@section('content')
<div class="container-fluid">
    @if (session('error'))
    <div class="alert alert-danger">
        {{ session('error') }}
    </div>
    @endif
    <form class="w-100 p-3 bg-white rounded shadow-sm border" action="{{ route('categories.store') }}" method="POST">
        @csrf
        <div class="mb-3">
            <label for="title" class="form-label">عنوان</label>
            <input type="text" name="title" id="title" class="form-control" required>
            @error('title')
            <p class="text-danger">{{ $message }}</p>
            @enderror
        </div>

        <div class="mb-3">
            <label for="description" class="form-label">توضیحات</label>
            <textarea name="description" id="description" class="form-control" rows="5"></textarea>
            @error('description')
            <p class="text-danger">{{ $message }}</p>
            @enderror
        </div>

        <div class="mb-3">
            <label for="slug" class="form-label">شناسه یکتا</label>
            <input type="text" name="slug" id="slug" class="form-control" pattern="[a-zA-Z]+" maxlength="50" min="1"
                required>
            @error('slug')
            <p class="text-danger">{{ $message }}</p>
            @enderror
        </div>

        <div class="d-flex flex-wrap mt-2">
            <button type="submit" class="btn btn-w-icon btn-primary mt-2 me-2">
                <i class="fa-solid fa-fw fa-check me-1"></i>
                ثبت
            </button>
            <a href="{{ route('categories.index') }}" class="btn btn-w-icon btn-outline-primary mt-2 me-2">
                <i class="fa-solid fa-fw fa-list-check me-1"></i>
                برگشتن
            </a>
        </div>
    </form>
</div>
@endsection