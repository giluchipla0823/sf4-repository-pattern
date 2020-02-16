<?php

namespace App\Repository\Books;

use App\Entity\Books\Book;
use App\Repository\BaseEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

class BookRepository extends BaseEntityRepository implements BookRepositoryInterface
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Book::class);
    }

    public function all(): array {


        return $this->repository->findAll();
    }

    public function find(int $id): ?Book
    {
        return $this->repository->find($id);
    }

    public function findOneByTitle(string $title): ?Book{
        return $this->repository->findOneBy(['title' => $title]);
    }
}