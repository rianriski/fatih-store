<?php

namespace App\Http\Controllers\Admin;

use App\Models\Comment;
use App\Models\Post;
use App\User;
use App\Http\Requests\CommentRequest;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class CommentController extends Controller
{
    public function index()
    {
        $comments = Comment::orderBy('created_at', 'desc')->paginate(5);

        return view('pages.blog.comments.index')->with([
            'comments' => $comments
        ]);
    }

    public function create()
    {
        $users = User::all();
        $posts = Post::all();

        return view('pages.blog.comments.create')->with([
            'users' => $users,
            'posts' => $posts,
        ]);
    }

    public function store(CommentRequest $request)
    {
        $data = $request->all();
        Comment::create($data);

        return redirect()
            ->route('comments')
            ->with('success', 'The comment has been added successfully');
    }

    public function search(Request $request)
    {
        $search = $request->get('search');

        $comments = Comment::where('comment', 'like', '%' . $search . '%')
            ->paginate(5);

        return view('pages.blog.comments.index')->with([
            'comments' => $comments
        ]);
    }

    public function edit($id)
    {
        $comment = Comment::findOrFail($id);

        return view('pages.blog.comments.edit')->with([
            'comment' => $comment,
        ]);
    }

    public function update(CommentRequest $request, $id)
    {
        $model = Comment::findOrFail($id);
        $model->update([
            'comment' => $request->comment
        ]);

        return redirect()
            ->route('comments')
            ->with('info', 'The comment has been updated successfully');
    }

    public function destroy($id)
    {
        $model = Comment::findOrFail($id);
        $model->delete();

        return redirect()
            ->route('comments')
            ->with('danger', 'The comment has been deleted successfully');
    }
}
