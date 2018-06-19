<?php

namespace MarsRover;

use MarsRover\Command\CommandStack;
use MarsRover\Command\ExecutableCommand;
use Exception;

class Rover
{
    /* @var Position */
    private $position;

    /* @var string */
    private $direction;

    /**
     * @param Position $position
     * @param string $direction
     *
     * @throws Exception
     */
    public function __construct(Position $position, $direction = 'N')
    {
        if ( ! in_array($direction, ['N', 'E', 'S', 'W'])) {
            throw new Exception('Invalid direction');
        }

        $this->position = $position;
        $this->direction = $direction;
    }

    /**
     * @return array
     */
    public function coordinates()
    {
        return $this->position->locate();
    }

    /**
     * @return string
     */
    public function direction()
    {
        return $this->direction;
    }

    /**
     * @param CommandStack $commandStack
     */
    public function executeNextCommand(CommandStack $commandStack)
    {
        /* @var ExecutableCommand $command */
        $command = $commandStack->next();
        $newPosition = $command->execute();

        $this->position = $newPosition;
    }
}
