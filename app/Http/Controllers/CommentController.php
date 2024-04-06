<?php

namespace App\Http\Controllers;

use App\Models\Comment;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Contracts\View\View;

class CommentController extends Controller
{
    public function index(): View
    {
        $comments = Comment::orderBy('created_at', 'desc')->paginate(30);
        return view('admin.comments.index', compact('comments'));
    }

    public function reply(Request $request, int $commentId)
    {
        $comment = Comment::findOrFail($commentId);
        $validatedData = $request->validate([
            'reply_message' => 'required'
        ]);
        $comment->update(['reply_message' => $validatedData['reply_message']]);
        return redirect()->route('comments.index')->with('success', 'پاسخ دیدگاه مورد نظر با موفقیت ثبت شد.');
    }

    public function toggleApprovementStatus(int $commentId)
    {
        $comment = Comment::findOrFail($commentId);
        $newApprovementStatus = !($comment->confirmed);
        $comment->update(['confirmed' => $newApprovementStatus]);
        return redirect()->back()->with('success', 'وضعیت دیدگاه مورد نظر با موفقیت تغییر یافت.');
    }

    public function deleteReply(int $comment_id)
    {
        $comment = Comment::findOrFail($comment_id);
        $comment->update(['reply_message' => '']);
    }

    public function deleteReplyAjax(int $id){
        $comment = Comment::findOrFail($id);
        $comment->update(['reply_message' => null]);
        return response()->json(['success' => 'بازخورد باموفقیت حذف شد'], 200);
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'id' => 'nullable|exists:comments',
            'post_id' => 'nullable|exists:posts,id,status,published',
            'message' => 'required|max:255'
        ]);
        if (!Auth::guard('user')?->user()?->id) {
            return redirect('user/login');
        }
        $validatedData['author_id'] = Auth::guard('user')?->user()?->id;
        $validatedData['parent_id'] = null;
        if ($request->filled('id')) {
            $comment = Comment::findOrFail($validatedData['id']);
            $validatedData['parent_id'] = $comment->id;
        }
        $comment = new Comment([
            'post_id' => $validatedData['post_id'],
            'parent_id' => $validatedData['parent_id'],
            'author_id' => $validatedData['author_id'],
            'message' => $validatedData['message'],
        ]);
        $comment->save();
        return redirect()->back()->with('success', 'دیدگاه شما با موفقیت ثبت شد.');
    }
}
