<?php

namespace App\Services;

use App\Repositories\BookGenreRepository;
use App\Repositories\ReviewRepository;
use App\Services\ReviewService;


class BookGenreService
{
    protected $bookGenreRepository;
    protected ReviewRepository $reviewRepository;
    protected ReviewService $reviewService;

    public function __construct(BookGenreRepository $bookGenreRepository)
    {
        $this->bookGenreRepository = $bookGenreRepository;
    }

    public function listar()
    {
        return $this->bookGenreRepository->getAll();
    }

    public function criar(array $data)
    {
        return $this->bookGenreRepository->create($data);
    }

    public function buscar($id)
    {
        return $this->bookGenreRepository->find($id);
    }

    public function atualizar($id, array $data)
    {
        return $this->bookGenreRepository->update($id, $data);
    }

    public function details($id){
        return $this->bookGenreRepository->details($id);
    }

    public function delete($id)
    {
    $bookGenreRepository = $this->bookGenreRepository->find($id);

    $bookGenreRepository->books()->detach();

    return $this->bookGenreRepository->delete($id);
    }
}
