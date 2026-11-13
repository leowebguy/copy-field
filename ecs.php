<?php

declare(strict_types=1);

use craft\ecs\SetList;
use PhpCsFixer\Fixer\FunctionNotation\FunctionDeclarationFixer;
use PhpCsFixer\Fixer\FunctionNotation\NoSpacesAfterFunctionNameFixer;
use Symplify\EasyCodingStandard\Config\ECSConfig;

return static function (ECSConfig $ecsConfig): void {
    $ecsConfig->parallel();
    $ecsConfig->paths([
        __DIR__ . '/src',
    ]);

    $ecsConfig->sets([SetList::CRAFT_CMS_4]);

    $ecsConfig->skip([
        FunctionDeclarationFixer::class,
        NoSpacesAfterFunctionNameFixer::class,
    ]);
};
