<?php

class User
{
    public function __construct(public string $name)
    {
    }
}

class UserRepository
{
    public function getUser(int $id): ?User
    {
        return match ($id) {
            1 => new User('Bob'),
            default => null,
        };
    }
}

$repository = new UserRepository();

$r1 = $repository?->getUser(1)?->name;
var_dump($r1); // "Bob"

$r2 = $repository?->getUser(5)?->name;
var_dump($r2); // NULL
