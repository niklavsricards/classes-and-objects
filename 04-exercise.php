<?php

class Movie
{
    private string $title;
    private string $studio;
    private string $rating;

    public function __construct(string $title, string $studio, string $rating)
    {
        $this->title = $title;
        $this->studio = $studio;
        $this->rating = $rating;
    }

    public function getTitle(): string
    {
        return $this->title;
    }

    public static function getPG(array $movies): array
    {
        $pgMovies = [];
        foreach ($movies as $movie) {
            if ($movie->rating === "PG") {
                $pgMovies[] = $movie;
            }
        }
        return $pgMovies;
    }
}

$movies = [
    new Movie('Casino Royale', 'Eon Productions', 'PG13'),
    new Movie('Glass', 'Buena Vista International', 'PG13'),
    new Movie('Spider-Man: Into the Spider-Verse', 'Columbia Pictures', 'PG'),
    new Movie('The Intern', 'Warner Bros', 'PG')
];

$pgMovies = Movie::getPG($movies);

foreach ($pgMovies as $movie) {
    echo "{$movie->getTitle()}" . PHP_EOL;
}