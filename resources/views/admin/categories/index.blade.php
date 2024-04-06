@section('title', 'دسته‌بندی‌ها')
@extends('layouts.admin')
@section('content')
<div class="container-fluid">
    <div class="d-flex flex-wrap mb-2">
        <a class="btn btn-w-icon btn-primary mb-2 me-2" href="{{ route('categories.create') }}">
            <i class="fa-solid fa-fw fa-plus me-1"></i>
            افزودن دسته‌بندی جدید
        </a>
    </div>

    <div class="w-100 bg-white rounded shadow-sm table-responsive border">
        <table class="table table-striped table-clickable">
            <thead>
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">عنوان</th>
                    <th scope="col">توضیحات</th>
                    <th scope="col">شناسه یکتا</th>
                    <th scope="col">والد</th>
                    <th scope="col">عملیات</th>
                </tr>
            </thead>
            <tbody>
                @forelse($categories as $category)
                <tr>
                    <th class="align-middle py-2" scope="row">{{ $loop->iteration }}</th>
                    <td class="align-middle py-2">{{ $category->title }}</td>
                    <td class="align-middle py-2">{{ $category->description }}</td>
                    <td class="align-middle py-2">{{ $category->slug }}</td>
                    <td class="align-middle py-2">
                        @if($category->parent)
                        {{ $category->parent->title }}
                        @else
                        -
                        @endif
                    </td>
                    <td class="text-muted align-middle py-2">
                        <a href="{{ route('categories.edit', $category->id) }}"
                            class="text-muted btn btn-sm d-inline-block">
                            <i class="fas fa-edit"></i>
                        </a>
                        <form action="{{ route('categories.destroy', $category->id) }}" method="POST"
                            class="d-inline-block">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-sm"
                                onclick="return confirm('مطمئنی میخوای این دسته‌بندی رو حذف کنی؟')">
                                <i class="fas fa-trash"></i>
                            </button>
                        </form>
                    </td>
                </tr>
                @empty
                <tr>
                    <td colspan="6" class="text-center py-3">نتیجه ای یافت نشد</td>
                </tr>
                @endforelse
            </tbody>
        </table>
        {{ $categories->links('templates.pagination') }}
    </div>
</div>
@endsection