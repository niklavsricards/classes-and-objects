<?php

class Point
{
    public int $x;
    public int $y;

    public function __construct(int $x, int $y)
    {
        $this->x = $x;
        $this->y = $y;
    }
}

$p1 = new Point(5, 2);
$p2 = new Point(-3, 6);

function swapPoints(object $p1, $p2): void {
    $temp_p1x = $p1->x;
    $temp_p1y = $p1->y;

    $p1->x = $p2->x;
    $p1->y = $p2->y;

    $p2->x = $temp_p1x;
    $p2->y = $temp_p1y;
}

swapPoints($p1, $p2);

echo "({$p1->x}, {$p1->y})";
echo PHP_EOL;
echo "({$p2->x}, {$p2->y})";