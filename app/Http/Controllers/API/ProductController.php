<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function index()
    {

        $product = Product::with('photo')
            ->paginate(3);

        if ($product)
            // jika data ditemukan, kembalikan data $product dan $message pakai function success
            return ResponseFormatterController::success($product, 'Data produk berhasil diambil');
        else
            // jika data tidak ditemukan, kembalikan data kosong, $message, dan $code
            return ResponseFormatterController::error(null, 'Data produk tidak ditemukan', 404);
    }

    public function best()
    {

        $product = Product::orderBy('sold', 'desc')
            ->with('photo')
            ->paginate(3);

        if ($product)
            // jika data ditemukan, kembalikan data $product dan $message pakai function success
            return ResponseFormatterController::success($product, 'Data produk berhasil diambil');
        else
            // jika data tidak ditemukan, kembalikan data kosong, $message, dan $code
            return ResponseFormatterController::error(null, 'Data produk tidak ditemukan', 404);
    }

    public function condition(Request $request)
    {

        $condition = $request->input('condition');

        $product = Product::where('condition', 'like', '%' . $condition . '%')
            ->with('photo')
            ->paginate(3);

        if ($product)
            return ResponseFormatterController::success($product, 'Data produk berhasil diambil');
        else
            return ResponseFormatterController::error(null, 'Data produk tidak ditemukan', 404);
    }

    public function price(Request $request)
    {

        $min = $request->input('min');
        $max = $request->input('max');

        $product = Product::whereBetween('price', [$min, $max])
            ->with('photo')
            ->paginate(3);

        if ($product)
            return ResponseFormatterController::success($product, 'Data produk berhasil diambil');
        else
            return ResponseFormatterController::error(null, 'Data produk tidak ditemukan', 404);
    }

    public function cheapest()
    {

        $product = Product::orderBy('price', 'asc')
            ->with('photo')
            ->paginate(3);

        if ($product)
            return ResponseFormatterController::success($product, 'Data produk berhasil diambil');
        else
            return ResponseFormatterController::error(null, 'Data produk tidak ditemukan', 404);
    }

    public function expensive()
    {

        $product = Product::orderBy('price', 'desc')
            ->with('photo')
            ->paginate(3);

        if ($product)
            return ResponseFormatterController::success($product, 'Data produk berhasil diambil');
        else
            return ResponseFormatterController::error(null, 'Data produk tidak ditemukan', 404);
    }

    public function category(Request $request)
    {
        $category = $request->input('category_id');

        $product = Product::where('category_id', $category)
            ->with(['photo', 'category'])
            ->paginate(3);

        if ($product)
            return ResponseFormatterController::success($product, 'Data produk berhasil diambil');
        else
            return ResponseFormatterController::error(null, 'Data produk tidak ditemukan', 404);
    }

    public function search(Request $request)
    {
        $search = $request->input('search');

        $product = Product::where('name', 'like', '%' . $search . '%')
            ->with(['photo', 'category'])
            ->paginate(3);

        if ($product)
            return ResponseFormatterController::success($product, 'Data produk berhasil diambil');
        else
            return ResponseFormatterController::error(null, 'Data produk tidak ditemukan', 404);
    }

    public function similar(Request $request)
    {
        $category = $request->input('category_id');
        $exceptId = $request->input('id');

        $product = Product::where('category_id', $category)
            ->where('id', '!=', $exceptId)
            ->with(['photo', 'category'])
            ->paginate(3);

        if ($product)
            return ResponseFormatterController::success($product, 'Data produk berhasil diambil');
        else
            return ResponseFormatterController::error(null, 'Data produk tidak ditemukan', 404);
    }
}
