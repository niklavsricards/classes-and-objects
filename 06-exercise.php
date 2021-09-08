<?php

class Data
{
    private int $surveyed;
    private float $purchasedEnergyDrinks;
    private float $preferCitrusDrinks;

    public function __construct(int $surveyed, float $purchasedEnergyDrinks, float $preferCitrusDrinks)
    {
        $this->surveyed = $surveyed;
        $this->purchasedEnergyDrinks = $purchasedEnergyDrinks;
        $this->preferCitrusDrinks = $preferCitrusDrinks;
    }

    public function getSurveyed(): int
    {
        return $this->surveyed;
    }

    public function getEnergyDrinkers(): int {
        return $this->surveyed * $this->purchasedEnergyDrinks;
    }

    public function getPreferCitrus(): int {
        return $this->getEnergyDrinkers() * $this->preferCitrusDrinks;
    }
}

$data = new Data(12467, 0.14, 0.64);

$surveyed = $data->getSurveyed();

echo "Total number of people surveyed " . $surveyed;

echo PHP_EOL;

echo "Approximately " . $data->getEnergyDrinkers() . " bought at least one energy drink";

echo PHP_EOL;

echo $data->getPreferCitrus() . " of those " . "prefer citrus flavored energy drinks.";