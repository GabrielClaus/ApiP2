<?php

namespace App\Services;

use App\Repositories\ReviewUsuaryRepository;
use App\Repositories\ReviewRepository;
use App\Services\ReviewService;


class ReviewUsuaryService
{
    protected $reviewUsuaryRepository;
    protected ReviewRepository $reviewRepository;
    protected ReviewService $reviewService;

    public function __construct(ReviewUsuaryService $reviewUsuaryRepository)
    {
        $this->reviewUsuaryRepository = $reviewUsuaryRepository;
    }

    public function getAll()
    {
        return $this->reviewUsuaryRepository->getAll();
    }

    public function getById($id)
    {
        return $this->reviewUsuaryRepository->getById($id);
    }

    public function create(array $data)
    {
        return $this->reviewUsuaryRepository->create($data);
    }

    public function update($id, array $data)
    {
        return $this->reviewUsuaryRepository->update($id, $data);
    }

    public function details($id){
        return $this->reviewUsuaryRepository->details($id);
    }

    public function delete($id)
    {
        $reviewUsuary = $this->details($id);
        $reviews = $this->reviewRepository->getByReviewUsuary($reviewUsuary->id);

        foreach ($reviews as $review) {
        $this->reviewRepository->delete($review->id);
        }
        return $this->reviewUsuaryRepository->delete($id);
    }
}

