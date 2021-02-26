<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Comment;
use Illuminate\Support\Facades\Auth;

class CommentController extends Controller
{

    public function index()
    {
        $comments = Comment::where('user_id', Auth::id())
            ->orderBy('created_at', 'desc')
            ->paginate(5);

        return view('pages.user.comments.index')->with([
            'comments' => $comments
        ]);
    }

    public function edit($id)
    {
        $comment = Comment::findOrFail($id);

        return view('pages.user.comments.edit')->with([
            'comment' => $comment,
        ]);
    }

    public function update(Request $request, $id)
    {
        $model = Comment::findOrFail($id);
        $model->update([
            'comment' => $request->comment
        ]);

        return redirect()
            ->route('user.comments')
            ->with('info', 'The comment has been updated successfully');
    }
}
