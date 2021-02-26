<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\Post;
use Illuminate\Http\Request;

class ArticleController extends Controller
{
    public function latest()
    {

        $article = Post::orderBy('created_at', 'desc')
            ->with('category')
            ->paginate(4);

        if ($article)
            return ResponseFormatterController::success($article, 'Data post berhasil diambil');
        else
            return ResponseFormatterController::error(null, 'Data post tidak ditemukan', 404);
    }

    public function first()
    {

        $article = Post::orderBy('created_at', 'asc')
            ->with('category')
            ->paginate(4);

        if ($article)
            return ResponseFormatterController::success($article, 'Data post berhasil diambil');
        else
            return ResponseFormatterController::error(null, 'Data post tidak ditemukan', 404);
    }

    public function popular()
    {

        $article = Post::orderBy('read_count', 'desc')
            ->with('category')
            ->paginate(4);

        if ($article)
            return ResponseFormatterController::success($article, 'Data post berhasil diambil');
        else
            return ResponseFormatterController::error(null, 'Data post tidak ditemukan', 404);
    }

    public function byid(Request $request)
    {
        $id = $request->input('id');

        $article = Post::with('category')->find($id);

        if ($article)
            return ResponseFormatterController::success($article, 'Data post berhasil diambil');
        else
            return ResponseFormatterController::error(null, 'Data post tidak ditemukan', 404);
    }
}
