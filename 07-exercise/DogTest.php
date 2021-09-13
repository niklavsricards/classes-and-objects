<?php

class DogTest
{
    private array $dogs;

    public function __construct(array $dogs)
    {
        foreach ($dogs as $dog)
        {
            $this->addDog($dog);
        }
    }

    public function addDog(Dog $dog): void
    {
        $this->dogs[] = $dog;
    }

    public function getDogs(): array
    {
        return $this->dogs;
    }
}