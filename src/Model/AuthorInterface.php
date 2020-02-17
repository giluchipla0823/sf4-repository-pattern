<?php

namespace App\Model;

interface AuthorInterface{

    public function __toString(): string;

    public function getId(): ?int;

    public function getName(): ?string;

    public function setName(string $name);

    public function getGender(): ?string;

    public function setGender(string $gender);

    public function getCountry(): ?string;

    public function setCountry(string $country);

    public function getCreatedAt(): ?\DateTimeInterface;

    public function setCreatedAt(?\DateTimeInterface $createdAt);

    public function getUpdatedAt(): ?\DateTimeInterface;

    public function setUpdatedAt(?\DateTimeInterface $updatedAt);

}
