<?php

namespace App\Http\Controllers\Admin\Traits;

use Illuminate\Http\Request;
use App\Review;

trait Reviews
{
    public function viewReviewScreen()
    {
        $reviews = $this->getReviews();

        return view('admin.reviews.reviews', [
            'userName' => auth()->user()->name,
            'reviews'  => $reviews
        ]);
    }

    public function getReviews()
    {
        return Review::get();
    }

    public function editReviews(Request $request)
    {
        $id = $request->id;

        $reviews = Review::where('id', $id);

        $reviews->update([
            'name'   => $request->name,
            'review' => $request->review,
        ]);

        return redirect()->back();
    }

    public function createReview(Request $request)
    {
        Review::create([
            'name'   => $request->name,
            'review' => $request->review,
        ]);

        return redirect()->back();
    }
}