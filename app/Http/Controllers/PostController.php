<?php

namespace App\Http\Controllers;

use App\Models\Admin;
use App\Models\Category;
use App\Models\Post;
use App\Models\Tag;
use Illuminate\Http\Request;

class PostController extends Controller
{
    public function index()
    {
        $posts = Post::orderBy('created_at', 'desc')->paginate(30);
        return view('admin.posts.index', compact('posts'));
    }

    public function create()
    {
        $categories = Category::all();
        $admins = Admin::all();
        return view('admin.posts.createOrEdit', compact('categories', 'admins'));
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'title' => 'required|max:255',
            'content' => 'required',
            'status' => 'required|in:draft,published,private',
            'slug' => 'required|unique:posts',
            'tags' => 'nullable',
            'short_description' => 'nullable',
            'author_id' => 'required|exists:admins,id',
            'categories' => 'array|exists:categories,id',
            'pinned' => 'nullable|boolean'
        ]);

        if ($request->hasFile('thumbnail')) {
            $request->thumbnail->store('public/upload');
            $validatedData['thumbnail'] = $request->thumbnail->hashName();
        }

        unset($validatedData['categories'], $validatedData['tags']);
        $post = Post::create($validatedData);

        // handle tags
        $tagsArray = explode(',', $request->input('tags', ''));
        if (!empty($tagsArray)) {
            $tagsArray = array_map('trim', $tagsArray);
            $tags = [];
            foreach ($tagsArray as $tagName) {
                $tag = Tag::firstOrCreate(['name' => $tagName]);
                $tags[] = $tag->id;
            }
            $post->tags()->sync($tags);
        }

        $post->categories()->sync($request->input('categories', []));

        $successMessage = 'نوشته جدید با موفقیت ذخیره شد.';
        if ($request->has('save_and_create_new')) {
            return redirect()->route('posts.create')->with('success', $successMessage);
        }
        return redirect()->route('posts.index')->with('success', $successMessage);
    }

    public function edit(int $id)
    {
        $post = Post::findOrFail($id);
        $categories = Category::all();
        $admins = Admin::all();
        return view('admin.posts.createOrEdit', compact('post', 'categories', 'admins'));
    }

    public function update(Request $request, int $id)
    {
        $post = Post::findOrFail($id);
        $validatedData = $request->validate([
            'title' => 'required|max:255',
            'content' => 'required',
            'status' => 'required|in:draft,published,private',
            'slug' => 'required|unique:posts,slug,' . $post->id,
            'tags' => 'nullable',
            'short_description' => 'nullable',
            'author_id' => 'required|exists:admins,id',
            'categories' => 'array|exists:categories,id',
            'pinned' => 'nullable|boolean'
        ]);

        $validatedData['pinned'] = $request->filled('pinned');

        if ($request->hasFile('thumbnail')) {
            $request->thumbnail->store('public/upload');
            $validatedData['thumbnail'] = $request->thumbnail->hashName();
        }

        unset($validatedData['categories'], $validatedData['tags']);
        $post->update($validatedData);
        $post->categories()->sync($request->input('categories', []));

        return redirect()->route('posts.index')->with('success', 'نوشته مورد نظر با موفقیت ویرایش شد.');
    }


    public function destroy(int $id)
    {
        $post = Post::findOrFail($id);
        $post->categories()->detach();
        $post->delete();
        return redirect()->route('posts.index')->with('success', 'نوشته مورد نظر با موفقیت حذف شد.');
    }
}
