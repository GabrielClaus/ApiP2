<?php

namespace App\Repositories;

use App\Models\Review;

class ReviewRepository
{
    public function getAll()
    {
        return Review::with(['book', 'usuary'])->get();
    }

    public function getById($id)
    {
        return Review::with(['book', 'usuary'])->findOrFail($id);
    }

    public function create(array $data)
    {
        return Review::create($data);
    }

    public function update($id, array $data)
    {
        $review = Review::findOrFail($id);
        $review->update($data);
        return $review;
    }

    public function delete($id)
    {
        $review = Review::findOrFail($id);
        $review->delete();
        return true;
    }

    public function getByReviewUsuary($reviewUsuaryId)
    {
    return Review::where('reviewUsuary_id', $reviewUsuaryId)->get();
    }

    public function getByBook($bookId)
    {
    return Review::where('book_id', $bookId)->get();
    }
}
