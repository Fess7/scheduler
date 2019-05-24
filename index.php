<?php

use Scheduler\Job\Command;
use Scheduler\Job\Count;
use Scheduler\Job\Job;
use Scheduler\Collection\JobCollection;
use Scheduler\Scheduler;

require __DIR__ . '/vendor/autoload.php';

const MONTH = 'month';
const WEEK = 'week';
$parameter = null;

foreach ($argv as $value) {
    if (in_array($value, [MONTH, WEEK])) {
        $parameter = $value;
        break;
    }
}

if (!$parameter) {
    exit('Parameter is null. Only are [' . WEEK . ', ' . MONTH . ']' . PHP_EOL);
}

$jobCollection = new JobCollection();

$prepareReport = new Job(
    new Command("php commands/PrepareReport.php {$parameter}"),
    new Count(3)
);
$jobCollection->addJob($prepareReport);

if ($parameter === WEEK) {
    $getWeekReport = new Job(
        new Command("php commands/GetWeekReport.php {$parameter}"),
        new Count(3)
    );
    $jobCollection->addJob($getWeekReport);
}

if ($parameter === MONTH) {
    $getMonthReport = new Job(
        new Command("php commands/GetMonthReport.php {$parameter}"),
        new Count(3)
    );
    $jobCollection->addJob($getMonthReport);
}

$scheduler = new Scheduler();
$scheduler->setResolver($jobCollection);
$scheduler->run();
