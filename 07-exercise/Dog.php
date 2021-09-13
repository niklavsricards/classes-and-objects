<?php

class Dog
{
    private string $name;
    private string $sex;
    private ?Dog $father;
    private ?Dog $mother;

    public function __construct(string $name, string $sex, ?Dog $father = null, ?Dog $mother = null)
    {
        $this->name = $name;
        $this->sex = $sex;
        $this->father = $father;
        $this->mother = $mother;
    }

    public function getName(): string
    {
        return $this->name;
    }

    public function getSex(): string
    {
        return $this->sex;
    }

    public function setFather(Dog $father): void
    {
        $this->father = $father;
    }

    public function setMother(Dog $mother): void
    {
        $this->mother = $mother;
    }

    public function getFather(): Dog|null
    {
        return $this->father;
    }

    public function getMother(): Dog|null
    {
        return $this->mother;
    }

    public function fathersName(): string
    {
        $father = $this->getFather();
        if ($father != null) {
            return "Father is {$father->getName()}";
        } else {
            return "Father is unknown";
        }
    }

    public function hasSameMotherAs(Dog $dog): bool
    {
        return $this->getMother() === $dog->getMother();
    }
}