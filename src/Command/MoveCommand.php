<?php

namespace MarsRover\Command;

use MarsRover\Position;
use Exception;

abstract class MoveCommand implements ExecutableCommand
{
    const MODE_FORWARD = 'forward';
    const MODE_BACKWARD = 'backward';

    /* @var Position */
    protected $position;

    /* @var string */
    protected $direction;

    /* @var string */
    protected $movementMode; // forward or backward

    /**
     * @param Position $position
     * @param string $direction
     */
    public function __construct(Position $position, $direction)
    {
        $this->position = $position;
        $this->direction = $direction;
    }

    /**
     * Move the rover by 1 in its current direction.
     *
     * @return Position
     * @throws Exception
     */
    public function execute()
    {
        $currentPosition = $this->position->locate();
        $x = $currentPosition['x'];
        $y = $currentPosition['y'];
        $modifier = ($this->movementMode == self::MODE_FORWARD) ? 1 : -1;

        switch ($this->direction) {
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
                throw new Exception("Invalid direction: {$this->direction}");
        }

        return new Position($x, $y);
    }
}
