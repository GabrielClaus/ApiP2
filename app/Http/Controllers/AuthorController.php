<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\AuthorRequest;
use App\Http\Resources\AuthorResource;
use App\Models\Author;
use App\Services\AuthorService;
use Illuminate\Http\Response;

class AuthorController extends Controller
{
    //
    protected $service;

    public function __construct(AuthorService $service)
    {
        $this->service = $service;
    }

    public function index()
    {
        $authors = $this->service->getAllAuthors();
        return AuthorResource::collection($authors);
    }

    public function store(AuthorRequest $request)
    {
        $author = $this->service->createAuthor($request->validated());
        return new AuthorResource($author);
    }

    public function show($id)
    {
        $author = $this->service->getAuthorById($id);
        return new AuthorResource($author->load('books'));
    }

    public function update(AuthorRequest $request, Author $author)
    {
        $updatedAuthor = $this->service->updateAuthor($author, $request->validated());
        return new AuthorResource($updatedAuthor);
    }



    public function destroy(Author $author)
    {
        $this->service->delete($author);
        return response()->json(null, Response::HTTP_NO_CONTENT);
    }
}

