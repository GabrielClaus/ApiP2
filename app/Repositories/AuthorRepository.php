<?php

namespace App\Repositories;

use App\Models\Author;

class AuthorRepository
{
    public function all()
    {
        return Author::all();
    }

    public function find($id)
    {
        return Author::with('books')->findOrFail($id);
    }

    public function create(array $data)
    {
        return Author::create($data);
    }

    public function update(Author $author, array $data)
    {
        $author->update($data);
        return $author;
    }

    public function details(int $id){
        return Author::findOrFail($id);

    }


    public function delete(int $id){
        $autor = $this->details($id);
        $autor->delete();
        return $autor;
    }
}
