<?php

namespace Scheduler\Job;

class Command
{
    /**
     * @var string
     */
    private $command;
    /**
     * @var string
     */
    private $cwd;
    /**
     * @var array
     */
    private $env;
    /**
     * @var null
     */
    private $input;
    /**
     * @var float
     */
    private $timeout;

    /**
     * Command constructor.
     * @param string $command
     * @param string|null $cwd
     * @param array|null $env
     * @param null $input
     * @param float $timeout
     */
    public function __construct(string $command, string $cwd = null, array $env = null, $input = null, float $timeout = 300)
    {
        $this->command = $command;
        $this->cwd = $cwd;
        $this->env = $env;
        $this->input = $input;
        $this->timeout = $timeout;
    }

    /**
     * @return string
     */
    public function getCommand(): string
    {
        return $this->command;
    }

    /**
     * @return string|null
     */
    public function getCwd(): ?string
    {
        return $this->cwd;
    }

    /**
     * @return array|null
     */
    public function getEnv(): ?array
    {
        return $this->env;
    }

    /**
     * @return null
     */
    public function getInput()
    {
        return $this->input;
    }

    /**
     * @return float
     */
    public function getTimeout(): float
    {
        return $this->timeout;
    }
}