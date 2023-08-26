<?php

class Point
{
    public int $z;

    public function __construct(
        public int $x,
        public int $y = 0
    ) {
        $this->z = 0;
    }
}

$p1 = new Point(1, 2);
var_dump($p1->x, $p1->y, $p1->z);

$p2 = new Point(1);
var_dump($p2->x, $p2->y, $p2->z);
