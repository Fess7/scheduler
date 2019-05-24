<?php

namespace Scheduler\Job;

class Count
{
    /**
     * @var int
     */
    private $count;

    /**
     * Count constructor.
     * @param int $count
     * @throws \Exception
     */
    public function __construct(int $count)
    {
        if ($count < 1) {
            throw new \Exception('Invalid count');
        }
        $this->count = $count;
    }

    /**
     * @param int $count
     * @return bool
     */
    public function isEqual(int $count): bool
    {
        return $this->count === $count;
    }
}