<?php

namespace App\Repository\Authors;

use App\Entity\Authors\Author;
use App\Repository\BaseEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

class AuthorRepository extends BaseEntityRepository implements AuthorRepositoryInterface
{

    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Author::class);
    }

    public function all(): array {
        return $this->repository->findAll();
    }

    public function find(int $id): ?Author
    {
        return $this->repository->find($id);
    }
}