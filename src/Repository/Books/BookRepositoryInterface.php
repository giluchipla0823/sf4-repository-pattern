<?php

namespace App\Repository\Books;

use App\Entity\Books\Book;

interface BookRepositoryInterface{
    public function all(): array ;

    public function find(int $id): ?Book;

    public function findOneByTitle(string $title): ?Book;

    public function create(Book $book): void;

    public function update(Book $book): void;

    public function remove(Book $book): void;
}
