<?php

class Account
{
    private string $name;
    private float $balance;

    public function __construct(string $name, float $balance)
    {
        $this->name = $name;
        $this->balance = $balance;
    }

    public function balance(): float
    {
        return $this->balance;
    }

    public function name(): string
    {
        return $this->name;
    }

    public function withdraw(float $amount): void
    {
        $this->balance -= $amount;
    }

    public function deposit(float $amount): void
    {
        $this->balance += $amount;
    }

    public static function transfer(Account $from, Account $to, float $howMuch)
    {
        $from->withdraw($howMuch);
        $to->deposit($howMuch);
    }
}

$accounts = [
    $mattsAccount = new Account("Matt's account", 1000),
    $myAccount = new Account("My account", 0),
];

Account::transfer($mattsAccount, $myAccount, 100);

foreach ($accounts as $account) {
    echo "{$account->name()}, {$account->balance()}" . PHP_EOL;
}