<?php

declare(strict_types=1);

namespace Boatrace\Sakura;

/**
 * @author shimomo
 */
class MainCalculator
{
    /**
     * @param  array  $arguments
     * @return float
     */
    public function calculateMedian(array $arguments): float
    {
        if (($count = count($arguments)) === 0) {
            return 0.0;
        }

        sort($arguments);

        $middle = floor(($count - 1) / 2);

        if ($count % 2) {
            return $arguments[$middle];
        }

        return (float) ($arguments[$middle] + $arguments[$middle + 1]) / 2;
    }

    /**
     * @param  array  $arguments
     * @return float
     */
    public function calculateAverage(array $arguments): float
    {
        if (($count = count($arguments)) === 0) {
            $count = 1.0;
        }

        return (float) (array_sum($arguments) / $count);
    }

    /**
     * @param  array  $arguments
     * @return float
     */
    public function calculateVariance(array $arguments): float
    {
        $variance = 0.0;

        if (count($arguments) === 0) {
            return $variance;
        }

        foreach ($arguments as $argument) {
            $variance += pow($argument - $this->calculateAverage($arguments), 2);
        }

        return (float) ($variance / count($arguments));
    }

    /**
     * @param  array  $arguments
     * @return float
     */
    public function calculateStandardDeviation(array $arguments): float
    {
        return (float) sqrt($this->calculateVariance($arguments));
    }

    /**
     * @param  float  $value
     * @return float
     */
    public function calculateReciprocal(float $value): float
    {
        return $value ? 1 / $value : 0.0;
    }

    /**
     * @param  array  $arguments
     * @return float
     */
    public function calculateSyntheticOdds(array $arguments): float
    {
        $syntheticOdds = 0.0;

        foreach ($arguments as $argument) {
            $syntheticOdds += $this->calculateReciprocal($argument);
        }

        return $this->calculateReciprocal($syntheticOdds);
    }
}
