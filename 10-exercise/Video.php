<?php

class Video
{
    private string $title;
    private bool $available;
    private array $ratings;

    public function __construct(string $title, array $ratings = [], bool $available = true,)
    {
        $this->title = $title;
        $this->ratings = $ratings;
        $this->available = $available;
    }

    public function getTitle(): string
    {
        return $this->title;
    }

    public function addRating(int $rating): void
    {
        $this->ratings[] = $rating;
    }

    public function setAvailability(bool $availability): void
    {
        $this->available = $availability;
    }

    public function getAvailability(): bool
    {
        return $this->available;
    }

    public function getAverageRating(): float
    {
        if (count($this->ratings) <= 0) return 0;

        return array_sum($this->ratings) / count($this->ratings);
    }
}