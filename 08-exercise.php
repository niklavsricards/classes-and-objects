<?php

class SavingsAccount
{
    private float $startingBalance;
    private float $balance;
    private float $annualInterest;
    private float $totalDeposits = 0;
    private float $totalWithdrawals = 0;

    public function __construct(float $balance, float $annualInterest)
    {
        $this->startingBalance = $balance;
        $this->balance = $balance;
        $this->annualInterest = $annualInterest;
    }

    public function getBalance(): float
    {
        return $this->balance;
    }

    public function getEndBalance(): string
    {
        $balance = number_format($this->balance, 2);
        return "Ending balance: $ {$balance}";
    }

    public function withdraw(float $withdrawal): void
    {
        $this->balance -= $withdrawal;
        $this->totalWithdrawals += $withdrawal;
    }

    public function deposit(float $deposit): void
    {
        $this->balance += $deposit;
        $this->totalDeposits += $deposit;
    }

    public function monthlyInterest(): float
    {
        return $this->annualInterest / 12;
    }

    public function monthlyCompound(): void
    {
        $this->balance += ($this->monthlyInterest()/100) * $this->balance;
    }

    public function getTotalDeposits(): string
    {
        $totalDeposits = number_format($this->totalDeposits, 2);
        return "Total deposited: $ {$totalDeposits}";
    }

    public function getTotalWithdrawals(): string
    {
        $totalWithdrawals = number_format($this->totalWithdrawals, 2);
        return "Total withdrawn: $ {$totalWithdrawals}";
    }

    public function getTotalInterestEarned(): string
    {
        $totalInterestEarned = $this->getBalance() - $this->startingBalance
            - $this->totalDeposits + $this->totalWithdrawals;

        $total = number_format($totalInterestEarned, 2);
        return "Interest earned: $ {$total}";
    }

    public function printAccountData(): void
    {
        echo $this->getTotalDeposits() . PHP_EOL;
        echo $this->getTotalWithdrawals() . PHP_EOL;
        echo $this->getTotalInterestEarned() . PHP_EOL;
        echo $this->getEndBalance() . PHP_EOL;
    }
}

$balance = (float) readline('How much money is in the account?: ');
$interestRate = (float) readline('Enter the annual interest rate: ');

$account = new SavingsAccount($balance, $interestRate);

$timePeriod = (int) readline('How long has the account been opened?: ');

for ($i = 1; $i <= $timePeriod; $i++) {
    $deposit = (float) readline("Enter the amount deposited for month {$i}: ");
    $account->deposit($deposit);

    $withdrawal = (float) readline("Enter the amount withdrawn for month {$i}: ");
    $account->withdraw($withdrawal);

    $account->monthlyCompound();
}

$account->printAccountData();
