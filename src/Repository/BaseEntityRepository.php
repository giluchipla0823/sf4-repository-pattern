<?php

namespace App\Repository;

use Doctrine\Persistence\ManagerRegistry;

class BaseEntityRepository
{
    protected $entityManager;

    protected $repository;

    public function __construct(ManagerRegistry $registry, string $entityClass)
    {
        $this->entityManager = $registry->getManagerForClass($entityClass);
        $this->repository = $this->entityManager->getRepository($entityClass);
    }
}