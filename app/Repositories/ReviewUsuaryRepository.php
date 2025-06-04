<?php

namespace App\Repositories;

use App\Models\ReviewUsuary;

class ReviewUsuaryRepository
{
    public function getAll()
    {
        return ReviewUsuary::all();
    }

    public function getById($id)
    {
        return ReviewUsuary::with(['usuary_id'])->findOrFail($id);
    }

    public function create(array $data)
    {
        return ReviewUsuary::create($data);
    }

    public function update($id, array $data)
    {
        $review = ReviewUsuary::findOrFail($id);
        $review->update($data);
        return $review;
    }


}
