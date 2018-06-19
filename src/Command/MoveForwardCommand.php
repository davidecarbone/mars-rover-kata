<?php

namespace MarsRover\Command;

use MarsRover\Position;

class MoveForwardCommand extends MoveCommand
{
    public function __construct(Position $position, $direction)
    {
        parent::__construct($position, $direction);
        $this->movementMode = self::MODE_FORWARD;
    }
}
