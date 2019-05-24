<?php

namespace Scheduler;

use Scheduler\Collection\CollectionInterface;
use Scheduler\Job\JobInterface;

class Scheduler
{
    /**
     * @var CollectionInterface
     */
    protected $collection;

    /**
     * @param CollectionInterface $collection
     */
    public function setResolver(CollectionInterface $collection)
    {
        $this->collection = $collection;
    }

    public function run()
    {
        /** @var JobInterface $job */
        foreach ($this->collection->getJobs() as $job) {
            $job->run();
        }

        echo '===Finish===' . PHP_EOL;
    }
}