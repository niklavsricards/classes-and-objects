<?php

class Date
{
    private string $month;
    private string $day;
    private string $year;

    public function __construct(string $month, string $day, string $year)
    {
        $this->month = $month;
        $this->day = $day;
        $this->year = $year;
    }

    public function getMonth(): string
    {
        return $this->month;
    }

    public function getDay(): string
    {
        return $this->day;
    }

    public function getYear(): string
    {
        return $this->year;
    }

    public function setMonth(string $month): void
    {
        $this->month = $month;
    }

    public function setDay(string $day): void
    {
        $this->day = $day;
    }

    public function setYear(string $year): void
    {
        $this->year = $year;
    }

    public function DisplayDate(): string
    {
        return "{$this->month}/{$this->day}/{$this->year}";
    }
}

$date = new Date('05','07','2000');
echo $date->DisplayDate();

echo PHP_EOL;

$date->setYear('2001');
echo $date->getYear();

echo PHP_EOL;

echo $date->DisplayDate();
