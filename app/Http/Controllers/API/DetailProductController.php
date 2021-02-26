<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\Product;
use App\Models\ProductPhoto;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class DetailProductController extends Controller
{
    public function all(Request $request)
    {
        $id = $request->input('id');

        if ($id) {
            $product = Product::with('photo')->find($id);


            if ($product)
                // jika data ditemukan, kembalikan data $product dan $message pakai function success
                return ResponseFormatterController::success($product, 'Data produk berhasil diambil');
            else
                // jika data tidak ditemukan, kembalikan data kosong, $message, dan $code
                return ResponseFormatterController::error(null, 'Data produk tidak ditemukan', 404);
        }
    }
}
