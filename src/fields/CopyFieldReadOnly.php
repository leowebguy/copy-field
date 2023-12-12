<?php
/**
 * A minimal click copy field for Craft CP
 *
 * @author     Leo Leoncio
 * @see        https://github.com/leowebguy
 * @copyright  Copyright (c) 2023, leowebguy
 * @license    MIT
 */

namespace leowebguy\copyfield\fields;

use Craft;
use craft\base\ElementInterface;
use craft\base\Field;
use Twig\Error\LoaderError;
use Twig\Error\RuntimeError;
use Twig\Error\SyntaxError;
use yii\base\Exception;

class CopyFieldReadOnly extends Field
{
    /**
     * @return string
     */
    public static function displayName(): string
    {
        return 'Copy (Readonly)';
    }

    /**
     * @param  mixed                 $value
     * @param  ElementInterface|null $element
     * @throws Exception
     * @throws LoaderError
     * @throws RuntimeError
     * @throws SyntaxError
     * @return string
     */
    public function getInputHtml(mixed $value, ?ElementInterface $element = null): string
    {
        return Craft::$app->getView()->renderTemplate(
            'copy-field/fieldread',
            [
                'name' => $this->handle,
                'value' => $value
            ]
        );
    }
}
