<?php

declare(strict_types=1);

use Rector\Config\RectorConfig;
use Rector\Core\Configuration\Option;
use Rector\Symfony\Rector\Property\JMSInjectPropertyToConstructorInjectionRector;

return static function (RectorConfig $rectorConfig): void {
    $rectorConfig->import(__DIR__ . '/../../../../../config/config.php');

    $parameters = $rectorConfig->parameters();
    $parameters->set(Option::SYMFONY_CONTAINER_XML_PATH_PARAMETER, __DIR__ . '/../xml/services.xml');

    $services = $rectorConfig->services();
    $services->set(JMSInjectPropertyToConstructorInjectionRector::class);
};
