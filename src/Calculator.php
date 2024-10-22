<?php

declare(strict_types=1);

namespace Boatrace\Sakura;

use DI\Container;
use DI\ContainerBuilder;

/**
 * @author shimomo
 */
class Calculator
{
    /**
     * @var \Boatrace\Sakura\MainCalculator
     */
    protected $calculator;

    /**
     * @var \Boatrace\Sakura\Calculator
     */
    protected static $instance;

    /**
     * @var \DI\Container
     */
    protected static $container;

    /**
     * @param  \Boatrace\Sakura\MainCalculator  $calculator
     * @return void
     */
    public function __construct(MainCalculator $calculator)
    {
        $this->calculator = $calculator;
    }

    /**
     * @param  string  $name
     * @param  array   $arguments
     * @return float
     */
    public function __call(string $name, array $arguments): float
    {
        return call_user_func_array([$this->calculator, $name], $arguments);
    }

    /**
     * @param  string  $name
     * @param  array   $arguments
     * @return float
     */
    public static function __callStatic(string $name, array $arguments): float
    {
        return call_user_func_array([self::getInstance(), $name], $arguments);
    }

    /**
     * @return \Boatrace\Sakura\Calculator
     */
    public static function getInstance(): Calculator
    {
        return self::$instance ?? self::$instance = (
            self::$container ?? self::$container = self::getContainer()
        )->get('Calculator');
    }

    /**
     * @return \DI\Container
     */
    public static function getContainer(): Container
    {
        $builder = new ContainerBuilder;
        $builder->addDefinitions(__DIR__ . '/../config/definitions.php');
        return $builder->build();
    }
}
