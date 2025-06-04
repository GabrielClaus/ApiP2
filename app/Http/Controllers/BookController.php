<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\StoreBookRequest;
use App\Http\Resources\BookResource;
use App\Services\BookService;

class BookController extends Controller
{
    protected $bookService;

    public function __construct(BookService $bookService)
    {
        $this->bookService = $bookService;
    }

    public function index()
    {
        return BookResource::collection($this->bookService->listar());
    }

    public function store(StoreBookRequest $request)
    {
        $livro = $this->bookService->criar($request->validated());
        return new BookResource($livro);
    }

    public function show($id)
    {
        return new BookResource($this->bookService->buscar($id));
    }

    public function update(StoreBookRequest $request, $id)
    {
        $livro = $this->bookService->atualizar($id, $request->validated());
        return new BookResource($livro);
    }

    public function destroy($id)
    {
        $this->bookService->delete($id);
        return response()->json(null, 204);
    }
}
