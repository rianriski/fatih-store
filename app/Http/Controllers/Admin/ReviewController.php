<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Review;
use App\Http\Requests\ReviewRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ReviewController extends Controller
{

    public function index()
    {
        $reviews = Review::orderBy('created_at', 'desc')->paginate(5);

        return view('pages.products.reviews.index')->with([
            'reviews' => $reviews
        ]);
    }

    public function show($id)
    {
        $review = Review::where('id', $id)->first();

        return view('pages.products.reviews.show')->with([
            'review' => $review
        ]);
    }

    public function search(Request $request)
    {
        $search = $request->get('search');
        $reviews = Review::where('review', 'like', '%' . $search . '%')
            ->orWhere('score', 'like', '%' . $search . '%')
            ->paginate(5);

        return view('pages.products.reviews.index')->with([
            'reviews' => $reviews
        ]);
    }

    public function edit($id)
    {
        $review = Review::where('id', $id)->first();

        return view('pages.products.reviews.edit')->with([
            'review' => $review
        ]);
    }

    public function update(ReviewRequest $request, $id)
    {
        $model = Review::where('id', $id)->first();
        $photo_review = Review::where('id', $id)->pluck('photo');

        if ($request->file('photo')) {
            if ($photo_review) {
                Storage::delete($photo_review[0]);
            }
            $photo = $request->file('photo')->store('photos');
        } else {
            $photo = $photo_review[0];
        }

        $model->update([
            'score' => $request->score,
            'review' => $request->review,
            'photo' => $photo,
        ]);

        return redirect()
            ->route('reviews')
            ->with('info', 'The review has been updated successfully');
    }

    public function destroy($id)
    {
        $model = Review::where('id', $id)->first();
        $photo = Review::where('id', $id)->pluck('photo');

        Storage::delete($photo[0]);
        $model->delete();

        return redirect()
            ->route('reviews')
            ->with('danger', 'The review has been deleted successfully');
    }
}
