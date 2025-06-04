<?php

namespace App\Services;

use App\Repositories\BookRepository;
use App\Repositories\ReviewRepository;
use App\Services\ReviewService;


class BookService
{
    protected $bookRepository;
    protected ReviewRepository $reviewRepository;
    protected ReviewService $reviewService;

    public function __construct(BookRepository $bookRepository)
    {
        $this->bookRepository = $bookRepository;
    }

    public function listar()
    {
        return $this->bookRepository->getAll();
    }

    public function criar(array $data)
    {
        return $this->bookRepository->create($data);
    }

    public function buscar($id)
    {
        return $this->bookRepository->find($id);
    }

    public function atualizar($id, array $data)
    {
        return $this->bookRepository->update($id, $data);
    }

    public function details($id){
        return $this->bookRepository->details($id);
    }

    public function delete($id)
    {
        $author = $this->details($id);
        $books = $this->reviewRepository->getByBook($author->id);

        foreach ($books as $book) {
        $this->reviewRepository->delete($book->id);
        }
        return $this->bookRepository->delete($id);
    }
}
