<?php

namespace Scheduler\Job;

use Symfony\Component\Process\Process;

class Job implements JobInterface
{
    private const TIMEOUT = 30;

    /**
     * @var Process
     */
    private $process;
    /**
     * @var Count
     */
    private $count;
    /**
     * @var ErrorCode
     */
    private $errorCode;

    public function __construct(Command $command, Count $count)
    {
        $this->process = Process::fromShellCommandline(
            $command->getCommand(),
            $command->getCwd(),
            $command->getEnv(),
            $command->getInput(),
            $command->getTimeout()
        );
        $this->count = $count;
        $this->errorCode = new ErrorCode();
    }

    public function run()
    {
        $count = 0;

        do {
            if ($count > 0) {
                echo 'ERR > Repeat one more time' . PHP_EOL;
            }

            $this->process->start();
            $this->process->wait();

            if ($this->errorCode->isEqual($this->process->getExitCode())) {
                sleep(self::TIMEOUT);
            }

            $count++;
        } while (!$this->process->isSuccessful() && !$this->count->isEqual($count));

        echo 'OUT > ' . $this->process->getOutput() . PHP_EOL;
        echo '===Job is finished===' . PHP_EOL;
    }
}