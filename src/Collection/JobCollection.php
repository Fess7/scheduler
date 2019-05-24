<?php

namespace Scheduler\Collection;

use Scheduler\Job\JobInterface;

class JobCollection implements CollectionInterface
{
    /**
     * @var array
     */
    protected $jobs;

    /**
     * JobCollection constructor.
     * @param array $jobs
     */
    public function __construct(array $jobs = [])
    {
        $this->jobs = $jobs;
    }

    /**
     * @param JobInterface $job
     */
    public function addJob(JobInterface $job)
    {
        $this->jobs[] = $job;
    }

    /**
     * @return array
     */
    public function getJobs(): array
    {
        return $this->jobs;
    }
}