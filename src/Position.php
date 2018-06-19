<?php

namespace MarsRover;

class Position
{
    private $x;
    private $y;


    /**
     * @param int $x
     * @param int $y
     */
    public function __construct($x, $y)
    {
        $this->x = $x;
        $this->y = $y;
    }

    /**
     * @return array
     */
    public function locate()
    {
        return [
            'x' => $this->x,
            'y' => $this->y
        ];
    }
}
