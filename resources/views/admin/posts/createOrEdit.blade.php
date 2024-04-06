@extends('layouts.admin')
@section('title', isset($post) ? 'ویرایش نوشته' : 'ثبت نوشته جدید')
@section('content')
    <div class="container-lg text-black">
        <div class="card mb-3">
            <div class="card-body">
                @include('templates.messages')
                <form class="w-100 main-form" id="post-form"
                      action="{{ isset($post) ? route('posts.update', $post->id) : route('posts.store') }}"
                      method="post"
                      enctype="multipart/form-data">
                    @csrf
                    @if (isset($post))
                        @method('PATCH')
                    @endif
                    <div class="row">
                        <div class="col-lg-8">
                            <div class="mb-3">
                                <label for="title" class="form-label fs-5">عنوان</label>
                                <input type="text" name="title" id="title" class="form-control"
                                       value="{{ old('title', isset($post) ? $post->title : '') }}" required
                                       maxlength="255">
                                @error('title')
                                <p class="text-danger">{{ $message }}</p>
                                @enderror
                            </div>

                            <div class="mb-3">
                                <label for="post-content" class="form-label fs-5">محتوا</label>
                                <textarea name="content" id="post-content" class="form-control"
                                          rows="15">{{ old('content', isset($post) ? $post->content : '') }}</textarea>
                                @error('content')
                                <p class="text-danger">{{ $message }}</p>
                                @enderror
                            </div>

                            {{--                            <div id="editorJS" class="w-100 rounded border px-4 py-3"--}}
                            {{--                                 data-placeholder="لورم ایپسوم"></div>--}}

                        </div>
                        <div class="col-lg-4">
                            <div id="action-section" class="w-100 p-3 bg-white rounded shadow-sm border mb-3">

                                <div class="mb-3">
                                    <label for="status" class="form-label fs-5">وضعیت</label>
                                    <select name="status" id="status" class="form-select" required>
                                        <option value="published" @selected(old('status', isset($post) ? $post->status : '') === 'published')>
                                            منتشر شده
                                        </option>
                                        <option value="private" @selected(old('status', isset($post) ? $post->status : '') === 'private')>
                                            خصوصی
                                        </option>
                                        <option value="draft" @selected(old('status', isset($post) ? $post->status : '') === 'draft')>
                                            پیش‌نویس
                                        </option>
                                    </select>
                                </div>

                                <div class="mb-3">
                                    <label for="author_id" class="form-label fs-5">نویسنده</label>
                                    <select name="author_id" id="author_id" class="form-select" required>
                                        @foreach ($admins as $admin)
                                            <option value="{{ $admin->id }}" @selected(old('author_id', isset($post) ? $post->author_id : '') === $admin->id)>
                                                {{ $admin->fullName }}
                                            </option>
                                        @endforeach
                                    </select>
                                </div>

                                <div class="mb-3">
                                    <div class="form-check">
                                        <input id="pinned" class="form-check-input" name="pinned" value="1"
                                               type="checkbox" @checked(old('pinned', isset($post) ? $post->pinned : false) == true)>
                                        <label for="pinned" class="form-check-label ms-1">
                                            پین به عنوان نوشته ویژه
                                        </label>
                                    </div>
                                </div>

                                <div class="d-flex flex-wrap mt-2">
                                    @if (isset($post))
                                        <button type="submit" class="btn btn-w-icon btn-primary mt-2 me-2">
                                            <i class="fa-solid fa-fw fa-edit me-1"></i>
                                            ذخیرۀ تغییرات
                                        </button>
                                        <button type="button" class="btn btn-w-icon btn-outline-danger mt-2 me-2"
                                                data-bs-toggle="modal" data-bs-target="#delete-blog-confirmation-modal">
                                            <i class="fa-solid fa-fw fa-trash me-1"></i>
                                            حذف
                                        </button>
                                    @else
                                        <button type="submit" class="btn btn-primary mt-2 me-2 btn-w-icon">
                                            <i class="fa fa-solid fa-check me-1"></i>
                                            ثبت
                                        </button>
                                        <button type="submit" class="btn btn-w-icon btn-outline-primary mt-2"
                                                name="save_and_create_new">
                                            <i class="fa-solid fa-fw fa-list-check me-1"></i>
                                            ثبت و ساخت جدید
                                        </button>
                                    @endif
                                </div>
                            </div>
                            <div class="w-100 p-3 bg-white rounded shadow-sm border">
                                <div class="mb-3">
                                    <label for="slug" class="form-label fs-5">شناسه یکتا</label>
                                    <input name="slug" type="text" class="form-control" id="slug" maxlength="50"
                                           value="{{ old('slug', isset($post) ? $post->slug : '') }}" required>
                                </div>
                                <div class="mb-3">
                                    <label for="thumbnail" class="form-label fs-5">تصویر بند انگشتی</label>
                                    <input type="file" accept="image/*" name="thumbnail" id="thumbnail"
                                           class="form-control" @required(!isset($post))>
                                    @if (isset($post) && $post->thumbnail)
                                        <div class="mt-2">
                                            <label class="form-label">تصویر فعلی:</label>
                                            <img src="{{ asset('storage/upload/' . $post->thumbnail) }}"
                                                 class="img-fluid rounded" alt="{{ isset($post) ? $post->title : '' }}">
                                        </div>
                                    @endif
                                </div>

                                <div class="mb-3">
                                    <fieldset>
                                        <legend class="form-label fs-5">دسته بندی</legend>
                                        <div class="form-check-group">
                                            @foreach ($categories as $category)
                                                <label for="category-{{ $category->id }}"
                                                       class="form-check-label form-check">
                                                    <input id="category-{{ $category->id }}" class="form-check-input"
                                                           name="categories[]" value="{{ $category->id }}"
                                                           type="checkbox"
                                                            @checked(old('category_id', isset($post) && in_array($category->id, $post->categories->pluck('id')->toArray())))>
                                                    {{ $category->title }}
                                                </label>
                                            @endforeach
                                        </div>
                                    </fieldset>
                                </div>

                                <div class="mb-3 dl-container" id="tags-section" data-value-type="single-value">
                                    <label for="tags-input" class="form-label fs-5">برچسب‌ها</label>
                                    <div class="input-group">
                                        <input type="text" id="tags-input" class="form-control dl-input"
                                               placeholder="برچسب ۱, برچسب ۲, برچسب ۳">
                                        <button type="button" class="btn btn-outline-primary btn-w-icon dl-add-btn">
                                            <i class="fa fa-solid fa-plus"></i>
                                            <span class="sr-only">افزودن</span>
                                        </button>
                                    </div>
                                    <label for="tags" class="d-none">
                                        برچسب ها
                                        <input class="hidden-value-input" name="tags" id="tags" type="text"
                                               value="{{ old('tags', isset($post) ? $post->tagNamesAsArray : '') }}">
                                    </label>
                                    <ul class="flex gap-2 mt-2 px-0" id="tag-list"></ul>
                                </div>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <!-- templates -->
    <template id="tag-list-item-template">
        <li class="badge text-bg-primary mb-1">
            <div class="d-flex align-items-center">
                <span class="list-item-text" data-value-target="#tags-input"></span>
                <button type='button' class='p-1 ms-1 btn btn-w-icon dl-delete-btn' onclick="removeListItem(this)">
                    <i class='fa fa-solid fa-close' style="color: var(--bs-gray-400);"></i>
                    <span class="sr-only">حذف</span>
                </button>
            </div>
        </li>
    </template>

    <!-- modals -->
    @if (isset($post))
        <div class="modal fade text-black" id="delete-blog-confirmation-modal" tabindex="-1" aria-modal="true"
             role="dialog">
            <div class="modal-dialog modal-dialog-centered">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title">حذف نوشته</h5>
                        <button type="button" class="btn-close m-0" data-bs-dismiss="modal"
                                aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <p class="fs-5 fw-medium">
                            مطمئنید می خواهید این نوشته را حذف کنید؟
                        </p>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-light" data-bs-dismiss="modal">خیر، نمی خواهم</button>
                        <form action="{{ route('posts.destroy', $post->id) }}" method="post" class="d-inline-block"
                              id="delete-modal-form">
                            @csrf
                            @method('DELETE')
                            <button class="btn btn-danger" type="submit" form="delete-modal-form">بله، حذف
                                کن
                            </button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    @endif
@endsection
@section('js')
    <script src="{{ asset('assets/js/ckeditor.js') }}"></script>
    <script>
        ClassicEditor
            .create(document.querySelector('#post-content'),
                {
                    language: {
                        content: 'fa'
                    }
                })
            .catch(error => {
                console.error(error);
            });
    </script>
@endsection