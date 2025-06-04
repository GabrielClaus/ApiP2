<?php

namespace App\Http\Controllers;

use App\Models\Book;
use App\Models\BookGenres;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class BookGenreController extends Controller
{
    protected $bookGenreService;

    public function store(BookGenreRequest $request)
    {
        $livro = $this->bookGenreService->criar($request->validated());
        return new BookGenreResource($livro);
    }

    public function attach(Request $request, $book_Id)
    {
        $request->validate([
            'genre_ids' => 'required|array',
            'genre_ids.*' => 'exists:genres,id',
        ]);
         $book = Book::findOrFail($book_Id);
        $book->genres()->syncWithoutDetaching($request->genre_ids);

        return response()->json(['message' => 'Gêneros adicionados com sucesso.']);
}
    public function detach($book_Id, $genre_Id)
    {
        $book = Book::findOrFail($book_Id);
        $book->genres()->detach($genre_Id);

        return response()->json(['message' => 'Gênero removido com sucesso.']);
    }
}
