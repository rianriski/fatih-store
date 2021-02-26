<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function index()
    {
        $categories = Category::all();

        if ($categories)
            // jika data ditemukan, kembalikan data $product dan $message pakai function success
            return ResponseFormatterController::success($categories, 'Data kategoru berhasil diambil');
        else
            // jika data tidak ditemukan, kembalikan data kosong, $message, dan $code
            return ResponseFormatterController::error(null, 'Data kategori tidak ditemukan', 404);
    }
}
