<?php

class VideoStore
{
    private array $videos = [];

    public function add(Video $video): void
    {
        $this->videos[] = $video;
    }

    public function getVideos(): array
    {
        return $this->videos;
    }

    public function search(string $title): ?Video
    {
        foreach ($this->getVideos() as $video)
        {
            if ($video->getTitle() === $title) return $video;
        }

        return null;
    }
}