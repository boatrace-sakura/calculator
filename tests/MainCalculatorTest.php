<?php

namespace Boatrace\Sakura\Tests;

use Boatrace\Sakura\MainCalculator;
use PHPUnit\Framework\TestCase as PHPUnitTestCase;

/**
 * @author shimomo
 */
class MainCalculatorTest extends PHPUnitTestCase
{
    /**
     * @var \Boatrace\Sakura\MainCalculator
     */
    protected $calculator;

    /**
     * @return void
     */
    public function setUp(): void
    {
        $this->calculator = new MainCalculator;
    }

    /**
     * @return void
     */
    public function testCalculateMedian(): void
    {
        $this->assertSame(3.0, $this->calculator->calculateMedian([5, 1, 3]));
        $this->assertSame(2.5, $this->calculator->calculateMedian([5, 1, 3, 2]));
    }

    /**
     * @return void
     */
    public function testCalculateAverage(): void
    {
        $this->assertSame(3.0, $this->calculator->calculateAverage([5, 1, 3]));
        $this->assertSame(2.75, $this->calculator->calculateAverage([5, 1, 3, 2]));
    }

    /**
     * @return void
     */
    public function testCalculateVariance(): void
    {
        $this->assertSame(4.0, $this->calculator->calculateVariance([5, 2, 6, 1, 3, 4, 7]));
        $this->assertSame(4.0, $this->calculator->calculateVariance([5, 2, 6, 1, 3, 4, 7, 1, 4]));
    }

    /**
     * @return void
     */
    public function testCalculateStandardDeviation(): void
    {
        $this->assertSame(2.0, $this->calculator->calculateStandardDeviation([5, 2, 6, 1, 3, 4, 7]));
        $this->assertSame(2.0, $this->calculator->calculateStandardDeviation([5, 2, 6, 1, 3, 4, 7, 1, 4]));
    }

    /**
     * @return void
     */
    public function testCalculateReciprocal(): void
    {
        $this->assertSame(0.25, $this->calculator->calculateReciprocal(4));
        $this->assertSame(0.125, $this->calculator->calculateReciprocal(8));
    }

    /**
     * @return void
     */
    public function testCalculateSyntheticOdds(): void
    {
        $this->assertSame(8.0, $this->calculator->calculateSyntheticOdds([12.0, 24.0]));
        $this->assertSame(6.0, $this->calculator->calculateSyntheticOdds([12.0, 24.0, 24.0]));
    }
}
