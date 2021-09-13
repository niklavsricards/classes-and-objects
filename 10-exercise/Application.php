<?php

require_once 'VideoStore.php';
require_once 'Video.php';

class Application
{
    private VideoStore $store;

    public function __construct()
    {
        $this->store = new VideoStore();
    }

    function run(): void
    {
        while (true) {
            echo "Choose the operation you want to perform \n";
            echo "Choose 0 for EXIT\n";
            echo "Choose 1 to fill video store\n";
            echo "Choose 2 to rent video (as user)\n";
            echo "Choose 3 to return video (as user)\n";
            echo "Choose 4 to list inventory\n";

            $command = (int)readline();

            switch ($command) {
                case 0:
                    echo "Bye!";
                    die;
                case 1:
                    $this->addMovies();
                    break;
                case 2:
                    $this->rentVideo();
                    break;
                case 3:
                    $this->returnVideo();
                    break;
                case 4:
                    $this->listInventory();
                    break;
                default:
                    echo "Sorry, I don't understand you..";
            }
        }
    }

    private function addMovies(): void
    {
        $title = readline('Enter title: ');
        $video = new Video($title);
        $this->store->add($video);
    }

    private function rentVideo(): void
    {
        $title = readline('Enter title: ');
        $video = $this->store->search($title);

        if ($video == null || $video->getAvailability() === true)
        {
            echo "Video not found" . PHP_EOL;
            return;
        }

        $vidoe->setAvailability(false);
    }

    private function returnVideo(): void
    {
        $title = readline('Enter title: ');
        $video = $this->store->search($title);

        if ($video == null || $video->getAvailability() === true)
        {
            echo "Video not found" . PHP_EOL;
            return;
        }

        $rating = (int) readline('Enter rating: ');

        $vidoe->setAvailability(true);
        $video->addRating($rating);
    }

    private function listInventory(): void
    {
        foreach ($this->store->getVideos() as $video)
        {
            $available = $video->getAvailability() ? "Yes" : "No";

            echo "[] {$video->getTitle()} - {$video->getAverageRating()} - {$available}" . PHP_EOL;
        }
    }
}

$app = new Application();
$app->run();