<?php

declare(strict_types=1);

use Rector\Config\RectorConfig;
use Rector\Symfony\Set\SymfonyLevelSetList;
use Rector\Symfony\Set\SymfonySetList;

return static function (RectorConfig $rectorConfig): void {
    $rectorConfig->import(SymfonySetList::SYMFONY_52);
    $rectorConfig->import(SymfonySetList::SYMFONY_52_VALIDATOR_ATTRIBUTES);
    $rectorConfig->import(SymfonySetList::ANNOTATIONS_TO_ATTRIBUTES);
    $rectorConfig->import(SymfonyLevelSetList::UP_TO_SYMFONY_51);
};
