<?php

namespace Orangesoft\Backoff\Factory;

use Orangesoft\Backoff\Backoff;
use Orangesoft\Backoff\BackoffInterface;
use Orangesoft\Backoff\Strategy\DecorrelationJitterStrategy;
use Orangesoft\Backoff\Config\ConfigBuilder;
use Orangesoft\Backoff\Duration\DurationInterface;

class DecorrelationJitterBackoff extends AbstractBackoff
{
    /**
     * @param DurationInterface $baseTime
     * @param DurationInterface $capTime
     * @param float|int $maxAttempts
     *
     * @return BackoffInterface
     */
    protected function getBackoff(DurationInterface $baseTime, DurationInterface $capTime, float $maxAttempts): BackoffInterface
    {
        return new Backoff(
            new DecorrelationJitterStrategy($baseTime),
            (new ConfigBuilder())
                ->setCapTime($capTime)
                ->setMaxAttempts($maxAttempts)
                ->build()
        );
    }
}
