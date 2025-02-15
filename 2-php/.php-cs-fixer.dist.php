<?php

$finder = (new PhpCsFixer\Finder())
    ->in('src');

return (new PhpCsFixer\Config())
    ->setRiskyAllowed(true)
    ->setRules([
        '@PER-CS' => true,
        '@PHP83Migration' => true,
        'strict_param' => true,
    ])
    ->setFinder($finder);