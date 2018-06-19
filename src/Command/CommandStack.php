<?php

namespace MarsRover\Command;

class CommandStack
{
    private $commands = [];

    /**
     * @param ExecutableCommand $command
     */
    public function add(ExecutableCommand $command)
    {
        $this->commands[] = $command;
    }

    /**
     * @return ExecutableCommand
     */
    public function next()
    {
        $command = $this->commands[0];
        unset($this->commands[0]);

        return $command;
    }
}
