<?php
/**
 * @author Alexey Samoylov <alexey.samoylov@gmail.com>
 */
namespace lagman\fancybox;

use yii\base\Widget;
use yii\helpers\Json;

class FancyBox extends Widget
{
    public $target;

    public $options = [];

    public function init()
    {
        assert(isset($this->target));

        $bundle = FancyBoxAsset::register($this->getView());

        if (isset($this->options['helpers']))
            $bundle->helpers = array_keys($this->options['helpers']);
    }

    public function run()
    {
        $options = Json::encode($this->options);
        $this->getView()->registerJs("jQuery('{$this->target}').fancybox({$options});");
    }
}