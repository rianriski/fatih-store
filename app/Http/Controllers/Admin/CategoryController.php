<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Http\Requests\CategoryRequest;
use Illuminate\Http\Request;
use App\Models\Category as ModelCategory;

class CategoryController extends Controller
{

    public function index()
    {
        $categories = Category::orderBy('created_at', 'desc')->paginate(5);

        return view('pages.products.categories.index')->with([
            'categories' => $categories
        ]);
    }

    public function create()
    {
        return view('pages.products.categories.create');
    }

    public function store(CategoryRequest $request)
    {
        $data = $request->all();
        ModelCategory::create($data);

        return redirect()
            ->route('categories')
            ->with('success', 'Category Created');
    }

    public function search(Request $request)
    {
        $search = $request->get('search');
        $categories = Category::where('category', 'like', '%' . $search . '%')->paginate(5);

        return view('pages.products.categories.index')->with([
            'categories' => $categories
        ]);
    }


    public function edit($id)
    {
        $category = ModelCategory::findOrFail($id);

        return view('pages.products.categories.edit')->with([
            'cat' => $category
        ]);
    }

    public function update(CategoryRequest $request, $id)
    {
        $data = $request->all();
        $model = Category::findOrFail($id);
        $model->update($data);

        return redirect()
            ->route('categories')
            ->with('info', 'Category Updated');
    }

    public function destroy($id)
    {
        $data = Category::findOrFail($id);
        $data->delete();

        return redirect()
            ->route('categories')
            ->with('danger', 'Category Deleted');
    }
}
