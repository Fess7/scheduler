<?php

$number = rand(1, 2);

if ($number === 1) {
    try {
        throw new \Exception(504);
    } catch (\Exception $exception) {
        exit(3);
    }
} else {
    exit('Ready GetWeekReport.php');
}