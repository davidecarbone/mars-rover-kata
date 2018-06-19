<?php

namespace MarsRover\Command;

use MarsRover\Position;
use MarsRover\Rover;
use Exception;

abstract class MoveCommand implements ExecutableCommand
{
    const MODE_FORWARD = 'forward';
    const MODE_BACKWARD = 'backward';

    /* @var Rover */
    protected $rover;

    /* @var string */
    protected $movementMode; // forward or backward

    /**
     * @param Rover $rover
     */
    public function __construct(Rover $rover)
    {
        $this->rover = $rover;
    }

    /**
     * Move the rover by 1 in its current direction.
     *
     * @return Position
     * @throws Exception
     */
    public function execute()
    {
        $currentPosition = $this->rover->coordinates();
        $x = $currentPosition['x'];
        $y = $currentPosition['y'];
        $modifier = ($this->movementMode == self::MODE_FORWARD) ? 1 : -1;

        switch ($this->rover->direction()) {
            case 'N':
                $y = $y + (1 * $modifier);
                break;
            case 'E':
                $x = $x + (1 * $modifier);
                break;
            case 'S':
                $y = $y - (1 * $modifier);
                break;
            case 'W':
                $x = $x - (1 * $modifier);
                break;
            default:
                throw new Exception("Invalid direction: {$this->rover->direction()}");
        }

        return new Position($x, $y);
    }
}
