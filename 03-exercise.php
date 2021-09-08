<?php

class FuelGauge
{
    private int $amountOfFuel;
    private int $fuelCapacity = 70;

    public function __construct(int $amountOfFuel = 70)
    {
        $this->amountOfFuel = $amountOfFuel;
    }

    public function getAmountOfFuel(): int
    {
        return $this->amountOfFuel;
    }

    public function getFuelTankCapacity(): int
    {
        return $this->fuelCapacity;
    }

    public function addFuel(): void
    {
        if ($this->amountOfFuel < 70) {
            $this->amountOfFuel += 1;
        }
    }

    public function burnFuel(): void
    {
        if ($this->amountOfFuel > 0) {
            $this->amountOfFuel -= 1;
        }
    }
}

class Odometer
{
    private int $mileage;
    private int $distanceTraveled = 0;
    private FuelGauge $fuelGauge;

    public function __construct(int $mileage, FuelGauge $fuelGauge)
    {
        $this->mileage = $mileage;
        $this->fuelGauge = $fuelGauge;
    }

    public function getMileage(): int
    {
        return $this->mileage;
    }

    public function addMileage(): void
    {
        $this->distanceTraveled++;
        if ($this->mileage === 999999) {
            $this->mileage = 0;
        } else {
            $this->mileage += 1;
        }
        if ($this->distanceTraveled % 10 === 0) {
            $this->fuelGauge->burnFuel();
        }
    }
}

$fuel = new FuelGauge(10);
$mileage = new Odometer(0, $fuel);

for ($i = 0; $i < $fuel->getFuelTankCapacity(); $i++) {
    $fuel->addFuel();
}

echo "Tank is full: {$fuel->getAmountOfFuel()}";

echo PHP_EOL;

while ($fuel->getAmountOfFuel() > 0) {
    $mileage->addMileage();
    echo "Mileage: " . $mileage->getMileage();

    echo PHP_EOL;

    echo "Fuel: " . $fuel->getAmountOfFuel();

    echo PHP_EOL;

    echo "---------------" . PHP_EOL;

    usleep(500000);
}