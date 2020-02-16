<?php

namespace App\Services\Authors;

use App\Entity\Authors\Author;
use App\Repository\Authors\AuthorRepositoryInterface;

class AuthorService
{
    private $repository;

    public function __construct(AuthorRepositoryInterface $repository)
    {
        $this->repository = $repository;
    }

    public function all(){
        return $this->repository->all();
    }

    public function find(int $id): ?Author {
        return $this->repository->find($id);
    }
}