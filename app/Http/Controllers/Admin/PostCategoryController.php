<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\PostCategory;
use App\Http\Requests\PostCategoryRequest;

class PostCategoryController extends Controller
{

    public function index()
    {
        $categories = PostCategory::orderBy('created_at', 'desc')->paginate(5);

        return view('pages.blog.categories.index')->with([
            'categories' => $categories
        ]);
    }

    public function create()
    {
        return view('pages.blog.categories.create');
    }

    public function store(PostCategoryRequest $request)
    {
        $data = $request->all();
        PostCategory::create($data);

        return redirect()
            ->route('post.categories')
            ->with('success', 'The category has been updated successfully');
    }

    public function edit($id)
    {
        $category = PostCategory::findOrFail($id);

        return view('pages.blog.categories.edit')->with([
            'cat' => $category
        ]);
    }

    public function update(PostCategoryRequest $request, $id)
    {
        $data = $request->all();
        $model = PostCategory::findOrFail($id);
        $model->update($data);

        return redirect()
            ->route('post.categories')
            ->with('info', 'The category has been updated successfully');
    }

    public function destroy($id)
    {
        $data = PostCategory::findOrFail($id);
        $data->delete();

        return redirect()
            ->route('post.categories')
            ->with('danger', 'The category has been deleted successfully');
    }
}
