<?php

namespace Orangesoft\BackOff\Tests\Strategy;

use PHPUnit\Framework\TestCase;
use Orangesoft\BackOff\Duration\Milliseconds;
use Orangesoft\BackOff\Strategy\ConstantStrategy;

class ConstantStrategyTest extends TestCase
{
    public function testCalculate(): void
    {
        $strategy = new ConstantStrategy();

        $duration = $strategy->calculate(new Milliseconds(1000), 3);

        $this->assertEquals(1000, $duration->asMilliseconds());
    }
}
