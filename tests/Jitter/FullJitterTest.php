<?php

namespace Orangesoft\BackOff\Tests\Jitter;

use PHPUnit\Framework\TestCase;
use Orangesoft\BackOff\Duration\Milliseconds;
use Orangesoft\BackOff\Jitter\FullJitter;

class FullJitterTest extends TestCase
{
    public function testJitter(): void
    {
        $equalJitter = new FullJitter();

        $duration = $equalJitter->jitter(new Milliseconds(1000));

        $this->assertGreaterThanOrEqual(0, $duration->asMilliseconds());
        $this->assertLessThanOrEqual(1000, $duration->asMilliseconds());
    }
}
