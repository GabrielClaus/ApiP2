<?php

namespace App\Http\Controllers;

use App\Http\Requests\ReviewUsuaryRequest;
use App\Http\Resources\ReviewUsuaryResource;
use App\Models\ReviewUsuary;
use Illuminate\Http\Request;

class ReviewUsuaryController extends Controller
{
    public function index()
    {
        $reviews = ReviewUsuary::all();
        return ReviewUsuaryResource::collection($reviews);
    }

    public function store(ReviewUsuaryRequest $request)
    {
        $review = ReviewUsuary::create($request->validated());
        return new ReviewUsuaryResource($review);
    }

    public function show($id)
    {
        $review = ReviewUsuary::findOrFail($id);
        return new ReviewUsuaryResource($review);
    }

    public function update(ReviewUsuaryRequest $request, $id)
    {
        $review = ReviewUsuary::findOrFail($id);
        $review->update($request->validated());
        return new ReviewUsuaryResource($review);
    }

    public function destroy($id)
    {
        $review = ReviewUsuary::findOrFail($id);
        $review->delete();
        return response()->json(null, 204);
    }
}
