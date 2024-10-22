<?php

declare(strict_types=1);

return [
    'Calculator' => \DI\create('\Boatrace\Sakura\Calculator')->constructor(
        \DI\get('MainCalculator')
    ),
    'MainCalculator' => function ($container) {
        return $container->get('\Boatrace\Sakura\MainCalculator');
    },
];
