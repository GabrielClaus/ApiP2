<?php

namespace App\Repositories;

use App\Models\Book;

class BookRepository
{
    public function getAll()
    {
        return Book::with(['autor', 'genero'])->get();
    }

    public function create(array $data)
    {
        return Book::create($data);
    }

    public function find($id)
    {
        return Book::with(['author', 'genere'])->findOrFail($id);
    }

    public function update($id, array $data)
    {
        $book = Book::findOrFail($id);
        $book->update($data);
        return $book;
    }

    public function delete($id)
    {
        Book::destroy($id);

    }

    public function details(int $id){
        return Book::findOrFail($id);

    }

    public function getByAuthorId($authorId)
    {
    return Book::where('author_id', $authorId)->get();
    }

}
