<?php

namespace App\Repositories;

use App\Models\Book;
use App\Models\BookGenres;

class BookGenreRepository
{
    public function getAll()
    {
        return BookGenres::with(['name'])->get();
    }

    public function create(array $data)
    {
        return BookGenres::create($data);
    }

    public function find($id)
    {
        return BookGenres::with(['name'])->findOrFail($id);
    }

    public function update($id, array $data)
    {
        $bookGenre = BookGenres::findOrFail($id);
        $bookGenre->update($data);
        return $bookGenre;
    }

    public function delete($id)
    {
        BookGenres::destroy($id);

    }

    public function details(int $id){
        return BookGenres::findOrFail($id);

    }

}
