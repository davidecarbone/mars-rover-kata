<?php

namespace MarsRover\Command;

use MarsRover\Position;

class MoveBackwardCommand extends MoveCommand
{
    public function __construct(Position $position, $direction)
    {
        parent::__construct($position, $direction);
        $this->movementMode = self::MODE_BACKWARD;
    }
}
