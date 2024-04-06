@section('title', 'نظرات و پیشنهاد ها')
@extends('layouts.admin')
@section('content')
    <div class="container-lg px-md-5 px-4 text-right" dir="rtl">
        <div class="card shadow">
            <div class="card-body">
                @include('templates.messages')
                <ul class="list-group mx-0 px-0 w-100">
                    @forelse($comments as $comment)
                        <li class="list-group-item">
                            <small class="d-inline-block mt-1 float-left badge badge-pill badge-secondary">
                                {{ $comment->updatedAgo }}
                            </small>
                            <strong>{{ $comment->author->name }}:</strong>
                            <div class="text-wrap mb-2">{!! $comment->message !!}</div>
                            @if ($comment->reply_message)
                                <div class="comment_reply rounded shadow bg-light p-3 my-2">
                                    <i class="fa fa-reply ml-2"></i>
                                    <span class="text-wrap">{!! nl2br($comment->reply_message) !!}</span>
                                </div>
                            @endif
                            <div class="d-flex align-items-center gap-2">
                                <a href="{{ url('admin/comments/' . $comment->id . '/toggleApprovementStatus') }}">
                                <span class="badge @if ($comment->confirmed) text-bg-success @else text-bg-secondary @endif p-2 cursor-pointer clickable-badge">
                                    @if ($comment->confirmed)
                                        تایید شده
                                    @else
                                        تایید نشده
                                    @endif
                                </span>
                                </a>
                                @if (!$comment->reply_message)
                                    <button class="btn btn-sm btn-outline-primary ml-2 btn-w-icon"
                                            onclick="openReplyModal(this,{{ $comment->id }})">
                                        <i class="fa fa-reply me-1"></i>
                                        ثبت پاسخ
                                    </button>
                                @else
                                    <button class="btn btn-link text-danger" data-bs-toggle="modal"
                                            data-bs-target="#delete-comment-reply-modal"
                                            data-comment-id="{{ $comment->id }}">
                                        حذف پاسخ
                                    </button>
                                @endif
                            </div>
                        </li>
                    @empty
                        <li class="list-group-item text-center">
                            نتیجه ای یافت نشد
                        </li>
                    @endforelse
                </ul>
            </div>
        </div>
    </div>
    <!-- Reply Modal -->
    <div class="modal fade text-black" id="reply-modal" tabindex="-1">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">ثبت پاسخ</h5>
                    <button type="button" class="btn-close m-0" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form method="post" id="reply-form">
                        @csrf
                        @method('PATCH')
                        <textarea name="reply_message" class="form-control"
                                  required>{{ old('reply_message') }}</textarea>
                    </form>
                </div>
                <div class="modal-footer justify-content-start">
                    <button type="button" class="btn btn-primary" onclick="saveReply();">
                        <i class="fa fa-save me-1"></i>
                        ثبت
                    </button>
                    <button class="btn btn-secondary" data-bs-dismiss="modal">بستن</button>
                </div>
            </div>
        </div>
    </div>

    <div class="modal fade text-black" id="delete-comment-reply-modal" tabindex="-1">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">حذف پاسخ</h5>
                    <button type="button" class="btn-close m-0" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <p>مطمئنید می خواهید این پاسخ را حذف کنید</p>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-light" data-bs-dismiss="modal">خیر، نمی خواهم</button>
                    <button class="btn btn-danger me-2" type="submit" id="modal-delete-comment-reply-btn">حذف کن
                    </button>
                </div>
            </div>
        </div>
    </div>
@stop
@section('js')
    <script src="{{ asset('assets/js/admin/show-comments.js') }}" defer></script>
@endsection