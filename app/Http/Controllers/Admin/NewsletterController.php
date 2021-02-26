<?php

namespace App\Http\Controllers\Admin;

use App\Models\Newsletter;
use App\Http\Requests\NewsletterRequest;
use App\Http\Requests\NewsletterUpdateRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use App\Http\Controllers\Controller;

class NewsletterController extends Controller
{

    public function index()
    {
        $newsletters = Newsletter::orderBy('created_at', 'desc')->paginate(5);

        return view('pages.newsletters.index')->with([
            'newsletters' => $newsletters
        ]);
    }

    public function create()
    {
        return view('pages.newsletters.create');
    }

    public function store(NewsletterRequest $request)
    {
        $thumbnail = $request->file('thumbnail')->store('photos');

        Newsletter::create([
            'title' => $request->title,
            'thumbnail' => $thumbnail,
            'article' => $request->article,
            'status' => $request->status,
        ]);

        return redirect()
            ->route('newsletters')
            ->with('success', 'The newsletter has been added successfully');
    }

    public function search(Request $request)
    {
        $search = $request->get('search');

        $newsletters = Newsletter::where('title', 'like', '%' . $search . '%')
            ->orWhere('status', 'like', '%' . $search . '%')
            ->paginate(5);

        return view('pages.newsletters.index')->with([
            'newsletters' => $newsletters
        ]);
    }

    public function edit($id)
    {
        $newsletter = Newsletter::findOrFail($id);

        return view('pages.newsletters.edit')->with([
            'newsletter' => $newsletter
        ]);
    }

    public function update(NewsletterUpdateRequest $request, $id)
    {
        $photo = Newsletter::where('id', $id)->pluck('thumbnail');

        if ($request->file('thumbnail')) {
            if ($photo) {
                Storage::delete($photo[0]);
            }
            $thumbnail = $request->file('thumbnail')->store('photos');
        } else {
            $thumbnail = $photo[0];
        }

        Newsletter::where('id', $id)->update([
            'title' => $request->title,
            'article' => $request->article,
            'status' => $request->status,
            'thumbnail' => $thumbnail,
        ]);

        return redirect()
            ->route('newsletters')
            ->with('info', 'The newsletter has been updated successfully');
    }

    public function destroy($id)
    {
        $model = Newsletter::findOrFail($id);
        $model->delete();

        return redirect()
            ->route('newsletters')
            ->with('danger', 'The newsletter has been deleted successfully');
    }
}
