<?php
/**
 * A minimal click copy field for Craft CP
 *
 * @author     Leo Leoncio
 * @see        https://github.com/leowebguy
 * @copyright  Copyright (c) 2024, leowebguy
 */

namespace leowebguy\copyfield;

use Craft;
use craft\base\Plugin as BasePlugin;
use craft\events\RegisterComponentTypesEvent;
use craft\services\Fields;
use craft\web\View;
use leowebguy\copyfield\assets\Assets;
use leowebguy\copyfield\fields\CopyField;
use leowebguy\copyfield\fields\CopyFieldReadOnly;
use yii\base\Event;

class Plugin extends BasePlugin
{
    public bool $hasCpSection = false;

    public bool $hasCpSettings = false;

    public function init(): void
    {
        parent::init();

        if (!$this->isInstalled) {
            return;
        }

        Event::on(
            View::class,
            View::EVENT_BEFORE_RENDER_TEMPLATE,
            static function() {
                if (Craft::$app->getRequest()->getIsCpRequest()) {
                    $view = Craft::$app->getView();
                    $view->registerAssetBundle(Assets::class);
                }
            }
        );

        Event::on(
            Fields::class,
            Fields::EVENT_REGISTER_FIELD_TYPES,
            function(RegisterComponentTypesEvent $event) {
                $event->types[] = CopyField::class;
                $event->types[] = CopyFieldReadOnly::class;
            }
        );

        Craft::info(
            'Copy Field plugin loaded',
            __METHOD__
        );
    }
}
