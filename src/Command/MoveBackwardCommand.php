<?php

namespace MarsRover\Command;

use MarsRover\Rover;

class MoveBackwardCommand extends MoveCommand
{
    public function __construct(Rover $rover)
    {
        parent::__construct($rover);
        $this->movementMode = self::MODE_BACKWARD;
    }
}
