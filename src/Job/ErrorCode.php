<?php

namespace Scheduler\Job;

class ErrorCode
{
    private const HTTP_GATEWAY_TIMEOUT = 3;

    public function isEqual(int $errorCode): bool
    {
        return self::HTTP_GATEWAY_TIMEOUT === $errorCode;
    }
}