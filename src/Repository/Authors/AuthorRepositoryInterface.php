<?php

namespace App\Repository\Authors;

use App\Entity\Authors\Author;

interface AuthorRepositoryInterface{
    public function all(): array ;

    public function find(int $id): ?Author;
}
