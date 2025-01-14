<?php

declare(strict_types=1);

use Rector\Config\RectorConfig;
use Rector\Symfony\Rector\Property\JMSInjectPropertyToConstructorInjectionRector;

return static function (RectorConfig $rectorConfig): void {
    $services = $rectorConfig->services();
    $services->set(JMSInjectPropertyToConstructorInjectionRector::class);
};
