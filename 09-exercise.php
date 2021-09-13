<?php

class BankAccount
{
    private string $name;
    private float $balance;

    public function __construct(string $name, float $balance)
    {
        $this->name = $name;
        $this->balance = $balance;
    }

    public function getBalance(): string
    {
        if ($this->balance < 0) {
            return "-$" . number_format(abs($this->balance), 2);
        } else {
            return "$" . number_format($this->balance, 2);
        }
    }

    public function showUserNameAndBalance(): string
    {
        return "{$this->name}, {$this->getBalance()}";
    }
}

$ben = new BankAccount('Benson', -17.5);
echo $ben->showUserNameAndBalance();