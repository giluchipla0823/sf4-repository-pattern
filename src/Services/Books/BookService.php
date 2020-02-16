<?php

namespace App\Services\Books;

use App\Entity\Books\Book;
use App\Repository\Books\BookRepositoryInterface;

class BookService
{
    private $repository;

    public function __construct(BookRepositoryInterface $repository)
    {
        $this->repository = $repository;
    }

    public function all(){
        return $this->repository->all();
    }

    public function find(int $id): ?Book {
        return $this->repository->find($id);
    }

    public function findOneByTitle(string $title): ?Book{
        return $this->repository->findOneByTitle($title);
    }
}