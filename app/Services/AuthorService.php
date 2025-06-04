<?php

namespace App\Services;

use App\Models\Author;
use App\Repositories\AuthorRepository;
use App\Repositories\BookRepository;
use App\Services\BookService;


class AuthorService
{
    protected $authorRepository;
    protected BookService $bookService;
    protected BookRepository $bookRepository;

    public function __construct(AuthorRepository $authorRepository)
    {
        $this->authorRepository = $authorRepository;
    }

    public function getAllAuthors()
    {
        return $this->authorRepository->all();
    }

    public function getAuthorById($id)
    {
        return $this->authorRepository->find($id);
    }

    public function createAuthor(array $data)
    {
        return $this->authorRepository->create($data);
    }

    public function updateAuthor(Author $author, array $data)
    {
        return $this->authorRepository->update($author, $data);
    }

    public function details($id){
        return $this->authorRepository->details($id);
    }

    public function delete($id)
    {
        $author = $this->details($id);
        $books = $this->bookRepository->getByAuthorId($author->id);

        foreach ($books as $book) {
        $this->bookService->delete($book->id);
        }
        return $this->authorRepository->delete($id);
    }
}


