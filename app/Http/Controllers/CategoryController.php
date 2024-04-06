<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;
use App\Models\Category;

class CategoryController extends Controller
{
    public function index()
    {
        $categories = Category::paginate(10);
        return view('admin.categories.index', compact('categories'));
    }

    public function create()
    {
        $categories = Category::all();
        return view('admin.categories.create', compact('categories'));
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'title' => 'required|max:255',
            'description' => 'nullable',
            'slug' => 'required|max:50|unique:categories,slug'
        ]);
        Category::create($validatedData);
        return redirect()->route('categories.index')
            ->with('success', 'دسته‌بندی با موفقیت ایجاد شد.');
    }


    public function show(int $id)
    {
        $post = Post::findOrFail($id);
        return view('admin.categories.show', compact('post'));
    }

    public function edit(int $id)
    {
        $category = Category::findOrFail($id);
        $categories = Category::all();
        return view('admin.categories.edit', compact('category', 'categories'));
    }

    public function update(Request $request, int $id)
    {
        $category = Category::findOrFail($id);
        $validatedData = $request->validate([
            'title' => 'required|max:255',
            'description' => 'nullable',
            'slug' => 'required|unique:categories,slug,' . $category->id,
        ]);

        $category->update($validatedData);
        return redirect()->route('categories.index')
            ->with('success', 'دسته‌بندی با موفقیت به‌روزرسانی شد.');
    }


    public function destroy(int $id)
    {
        $category = Category::findOrFail($id);
        $category->delete();
        return redirect()->route('categories.index')
            ->with('success', 'دسته بندی با موفقیت حذف شد');
    }
}
