<?php
/**
 * @author Alexey Samoylov <alexey.samoylov@gmail.com>
 */
namespace lagman\fancybox;

use yii\web\AssetBundle;

class FancyBoxAsset extends AssetBundle
{
    public $sourcePath = '@vendor/lagman/fancybox/source';

    public $css = [
        'jquery.fancybox.css'
    ];

    public $depends = [
        'yii\web\JqueryAsset',
    ];

    public $helpers = [];

    /**
     * @inheritdoc
     */
    public function registerAssetFiles($view) {
        $this->js[] = defined(YII_DEBUG) ? 'jquery.fancybox.js' : 'jquery.fancybox.pack.js';
        foreach ($this->helpers as $helper)
            $this->registerHelper($helper);
        parent::registerAssetFiles($view);
    }

    /**
     * @param string $helper
     */
    protected function registerHelper($helper)
    {
        switch ($helper) {
            case 'buttons':
                $this->js[] = 'helpers/jquery.fancybox-buttons.js';
                $this->css[] = 'helpers/jquery.fancybox-buttons.css';
                break;
            case 'media':
                $this->js[] = 'helpers/jquery.fancybox-media.js';
                break;
            case 'thumbs':
                $this->js[] = 'helpers/jquery.fancybox-thumbs.js';
                $this->css[] = 'helpers/jquery.fancybox-thumbs.css';
        }
    }
}