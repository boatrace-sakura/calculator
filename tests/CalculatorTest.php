<?php

declare(strict_types=1);

namespace Boatrace\Sakura\Tests;

use Boatrace\Sakura\Calculator;
use PHPUnit\Framework\TestCase as PHPUnitTestCase;

/**
 * @author shimomo
 */
class CalculatorTest extends PHPUnitTestCase
{
    /**
     * @return void
     */
    public function testCalculateMedian(): void
    {
        $this->assertSame(3.0, Calculator::calculateMedian([5, 1, 3]));
        $this->assertSame(2.5, Calculator::calculateMedian([5, 1, 3, 2]));
    }

    /**
     * @return void
     */
    public function testCalculateAverage(): void
    {
        $this->assertSame(3.0, Calculator::calculateAverage([5, 1, 3]));
        $this->assertSame(2.75, Calculator::calculateAverage([5, 1, 3, 2]));
    }

    /**
     * @return void
     */
    public function testCalculateVariance(): void
    {
        $this->assertSame(4.0, Calculator::calculateVariance([5, 2, 6, 1, 3, 4, 7]));
        $this->assertSame(4.0, Calculator::calculateVariance([5, 2, 6, 1, 3, 4, 7, 1, 4]));
    }

    /**
     * @return void
     */
    public function testCalculateStandardDeviation(): void
    {
        $this->assertSame(2.0, Calculator::calculateStandardDeviation([5, 2, 6, 1, 3, 4, 7]));
        $this->assertSame(2.0, Calculator::calculateStandardDeviation([5, 2, 6, 1, 3, 4, 7, 1, 4]));
    }

    /**
     * @return void
     */
    public function testCalculateReciprocal(): void
    {
        $this->assertSame(0.25, Calculator::calculateReciprocal(4));
        $this->assertSame(0.125, Calculator::calculateReciprocal(8));
    }

    /**
     * @return void
     */
    public function testCalculateSyntheticOdds(): void
    {
        $this->assertSame(8.0, Calculator::calculateSyntheticOdds([12.0, 24.0]));
        $this->assertSame(6.0, Calculator::calculateSyntheticOdds([12.0, 24.0, 24.0]));
    }
}
