<?php

namespace App\Http\Controllers\Admin;

use App\Models\PostCategory;
use Illuminate\Http\Request;
use App\Models\Post;
use App\Http\Requests\PostRequest;
use App\Http\Requests\PostUpdateRequest;
use Illuminate\Support\Facades\Storage;
use App\Http\Controllers\Controller;

class PostController extends Controller
{

    public function index()
    {
        $posts = Post::orderBy('created_at', 'desc')->paginate(5);

        return view('pages.blog.posts.index')->with([
            'posts' => $posts
        ]);
    }

    public function create()
    {
        $categories = PostCategory::all();

        return view('pages.blog.posts.create')->with([
            'categories' => $categories
        ]);
    }

    public function store(PostRequest $request)
    {
        $thumbnail = $request->file('thumbnail')->store('photos');

        Post::create([
            'user_id' => $request->user_id,
            'category_id' => $request->category_id,
            'title' => $request->title,
            'thumbnail' => $thumbnail,
            'post' => $request->post,
            'status' => $request->status,
        ]);

        return redirect()
            ->route('posts')
            ->with('success', 'The post has been updated successfully');
    }

    public function show($id)
    {
        //
    }

    public function search(Request $request)
    {
        $search = $request->get('search');

        $posts = Post::where('title', 'like', '%' . $search . '%')
            ->orWhere('status', 'like', '%' . $search . '%')
            ->paginate(5);

        return view('pages.blog.posts.index')->with([
            'posts' => $posts
        ]);
    }

    public function edit($id)
    {
        $post = Post::findOrFail($id);
        $categories = PostCategory::all();

        return view('pages.blog.posts.edit')->with([
            'categories' => $categories,
            'post' => $post,
        ]);
    }

    public function update(PostUpdateRequest $request, $id)
    {
        $photo = Post::where('id', $id)->pluck('thumbnail');

        if ($request->file('thumbnail')) {
            if ($photo) {
                Storage::delete($photo[0]);
            }
            $thumbnail = $request->file('thumbnail')->store('photos');
        } else {
            $thumbnail = $photo[0];
        }

        Post::where('id', $id)->update([
            'user_id' => $request->user_id,
            'category_id' => $request->category_id,
            'title' => $request->title,
            'thumbnail' => $thumbnail,
            'post' => $request->post,
            'status' => $request->status,
        ]);

        return redirect()
            ->route('posts')
            ->with('info', 'The post has been updated successfully');
    }

    public function destroy($id)
    {
        $model = Post::where('id', $id)->first();
        $thumbnail = Post::where('id', $id)->pluck('thumbnail');

        Storage::delete($thumbnail[0]);
        $model->delete();

        return redirect()
            ->route('posts')
            ->with('danger', 'The post has been deleted successfully');
    }
}
