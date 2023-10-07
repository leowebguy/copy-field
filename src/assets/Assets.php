<?php
/**
 * A minimal click copy field for Craft CP
 *
 * @author     Leo Leoncio
 * @see        https://github.com/leowebguy
 * @copyright  Copyright (c) 2023, leowebguy
 * @license    MIT
 */

namespace leowebguy\copyfield\assets;

use craft\web\AssetBundle;
use craft\web\assets\cp\CpAsset;

class Assets extends AssetBundle
{
    public function init(): void
    {
        $this->sourcePath = '@leowebguy/copyfield/assets';
        $this->depends = [CpAsset::class];

        $this->css = [
            'css/copy.css'
        ];

        $this->js = [
            'js/copy.js'
        ];

        parent::init();
    }
}
