<?php

namespace MarsRover\Test;

use MarsRover\Command\CommandStack;
use MarsRover\Command\MoveForwardCommand;
use MarsRover\Command\MoveBackwardCommand;
use MarsRover\Position;
use MarsRover\Rover;

class RoverTest extends \PHPUnit_Framework_TestCase
{
    public function testRoverHasStartingPoint()
    {
        $position = new Position(0, 0);
        $rover = new Rover($position);
        $roverCoordinates = $rover->coordinates();

        $this->assertEquals(0, $roverCoordinates['x']);
        $this->assertEquals(0, $roverCoordinates['y']);
    }

    public function testRoverMovesToNorth()
    {
        $position = new Position(0, 0);
        $direction = 'N';
        $rover = new Rover($position, $direction);

        $commandStack = new CommandStack();
        $commandStack->add(new MoveForwardCommand($position, $direction));

        $rover->executeNextCommand($commandStack);
        $roverCoordinates = $rover->coordinates();

        $this->assertEquals(1, $roverCoordinates['y']);
    }

    public function testRoverMovesToSouth()
    {
        $position = new Position(0, 0);
        $direction = 'S';
        $rover = new Rover($position, $direction);

        $commandStack = new CommandStack();
        $commandStack->add(new MoveForwardCommand($position, $direction));

        $rover->executeNextCommand($commandStack);
        $roverCoordinates = $rover->coordinates();

        $this->assertEquals(-1, $roverCoordinates['y']);
    }

    public function testRoverMovesToEast()
    {
        $position = new Position(0, 0);
        $direction = 'E';
        $rover = new Rover($position, $direction);

        $commandStack = new CommandStack();
        $commandStack->add(new MoveForwardCommand($position, $direction));

        $rover->executeNextCommand($commandStack);
        $roverCoordinates = $rover->coordinates();

        $this->assertEquals(1, $roverCoordinates['x']);
    }

    public function testRoverMovesToWest()
    {
        $position = new Position(0, 0);
        $direction = 'W';
        $rover = new Rover($position, $direction);

        $commandStack = new CommandStack();
        $commandStack->add(new MoveForwardCommand($position, $direction));

        $rover->executeNextCommand($commandStack);
        $roverCoordinates = $rover->coordinates();

        $this->assertEquals(-1, $roverCoordinates['x']);
    }

    public function testRoverMovesBackward()
    {
        $position = new Position(0, 0);
        $direction = 'N';
        $rover = new Rover($position, $direction);

        $commandStack = new CommandStack();
        $commandStack->add(new MoveBackwardCommand($position, $direction));

        $rover->executeNextCommand($commandStack);
        $roverCoordinates = $rover->coordinates();

        $this->assertEquals(-1, $roverCoordinates['y']);
    }
}
