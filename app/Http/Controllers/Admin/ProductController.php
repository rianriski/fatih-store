<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Http\Requests\ProductRequest;
use App\Http\Requests\ProductPhotoRequest;
use App\Models\Product;
use App\Models\ProductPhoto;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ProductController extends Controller
{

    public function index()
    {
        $products = Product::orderBy('created_at', 'desc')->paginate(5);

        return view('pages.products.list.index')->with([
            'products' => $products
        ]);
    }

    public function create()
    {
        $categories = Category::all();
        return view('pages.products.list.create')->with([
            'categories' => $categories
        ]);
    }

    public function store(ProductRequest $request)
    {
        $data = $request->all();
        $product = Product::create($data);

        $main = $request->file('is_default')->store('photos');
        $second = $request->file('photo_1')->store('photos');
        $third = $request->file('photo_2')->store('photos');
        $fourth = $request->file('photo_3')->store('photos');

        $product->photo()->create([
            'product_id' => $product->id,
            'is_default' => $main,
            'photo_1' => $second,
            'photo_2' => $third,
            'photo_3' => $fourth,
        ]);

        return redirect()
            ->route('products')
            ->with('success', 'The product has been added successfully');
    }

    public function show($id)
    {
        $product = Product::findOrFail($id);

        return view('pages.products.list.show')->with([
            'product' => $product,
        ]);
    }

    public function search(Request $request)
    {
        $search = $request->get('search');
        $products = Product::where('name', 'like', '%' . $search . '%')->paginate(5);

        return view('pages.products.list.index')->with([
            'products' => $products
        ]);
    }

    public function edit($id)
    {
        $product = Product::findOrFail($id);
        $categories = Category::all();

        return view('pages.products.list.edit')->with([
            'product' => $product,
            'categories' => $categories
        ]);
    }

    public function update(ProductPhotoRequest $request, $id)
    {

        $data = $request->all();
        $model = Product::findOrFail($id);
        $model->update($data);

        $main_db = ProductPhoto::where('product_id', $id)->pluck('is_default');
        $second_db = ProductPhoto::where('product_id', $id)->pluck('photo_1');
        $third_db = ProductPhoto::where('product_id', $id)->pluck('photo_2');
        $fourth_db = ProductPhoto::where('product_id', $id)->pluck('photo_3');

        // MAIN PHOTO
        if ($request->file('is_default')) {
            if ($main_db) {
                Storage::delete($main_db[0]);
            }
            $main = $request->file('is_default')->store('photos');
        } else {
            $main = $main_db[0];
        }

        // SECOND PHOTO
        if ($request->file('photo_1')) {
            if ($second_db) {
                Storage::delete($second_db[0]);
            }
            $second = $request->file('photo_1')->store('photos');
        } else {
            $second = $second_db[0];
        }

        // THIRD PHOTO
        if ($request->file('photo_2')) {
            if ($third_db) {
                Storage::delete($third_db[0]);
            }
            $third = $request->file('photo_2')->store('photos');
        } else {
            $third = $third_db[0];
        }

        // FOURTH PHOTO
        if ($request->file('photo_3')) {
            if ($fourth_db) {
                Storage::delete($fourth_db[0]);
            }
            $fourth = $request->file('photo_3')->store('photos');
        } else {
            $fourth = $fourth_db[0];
        }

        $model->photo()->update([
            'is_default' => $main,
            'photo_1' => $second,
            'photo_2' => $third,
            'photo_3' => $fourth,
        ]);

        return redirect()
            ->route('products')
            ->with('info', 'The product has been updated successfully');
    }

    public function destroy($id)
    {
        $data = Product::findOrFail($id);
        $main_db = ProductPhoto::where('product_id', $id)->pluck('is_default');
        $second_db = ProductPhoto::where('product_id', $id)->pluck('photo_1');
        $third_db = ProductPhoto::where('product_id', $id)->pluck('photo_2');
        $fourth_db = ProductPhoto::where('product_id', $id)->pluck('photo_3');

        $data->delete();
        Storage::delete([$main_db[0], $second_db[0], $third_db[0], $fourth_db[0]]);

        return redirect()
            ->route('products')
            ->with('danger', 'The product has been deleted successfully');
    }
}
