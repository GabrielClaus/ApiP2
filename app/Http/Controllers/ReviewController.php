<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\ReviewRequest;
use App\Http\Resources\ReviewResource;
use App\Services\ReviewService;
use Illuminate\Http\JsonResponse;

class ReviewController extends Controller
{
    //
    protected $service;

    public function __construct(ReviewService $service)
    {
        $this->service = $service;
    }

    public function index()
    {
        $reviews = $this->service->getAll();
        return ReviewResource::collection($reviews);
    }

    public function store(ReviewRequest $request)
    {
        $review = $this->service->create($request->validated());
        return new ReviewResource($review);
    }

    public function show($id)
    {
        $review = $this->service->getById($id);
        return new ReviewResource($review);
    }

    public function update(ReviewRequest $request, $id)
    {
        $review = $this->service->update($id, $request->validated());
        return new ReviewResource($review);
    }

    public function destroy($id)
    {
        $this->service->delete($id);
        return response()->json(['message' => 'Review deleted successfully']);
    }
}
