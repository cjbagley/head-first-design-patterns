<?php

declare(strict_types=1);

use Rector\Config\RectorConfig;

return RectorConfig::configure()
    ->withRootFiles()
    ->withPaths([
        __DIR__.'/src',
    ])
    ->withPhpSets()
    ->withComposerBased(
        phpunit: true,
    )
    ->withCodeQualityLevel(10)
    ->withCodingStyleLevel(10)
    ->withDeadCodeLevel(10)
    ->withTypeCoverageLevel(10)
    ->withTypeCoverageDocblockLevel(10)
    ->withAttributesSets(
        phpunit: true,
    );