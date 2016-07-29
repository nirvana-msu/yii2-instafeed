<?php
/**
 * @link https://github.com/nirvana-msu/yii2-instafeed
 * @copyright Copyright (c) 2016 Alexander Stepanov
 * @license MIT
 */

namespace nirvana\instafeed;

use Yii;
use yii\web\AssetBundle;

/**
 * @author Alexander Stepanov <student_vmk@mail.ru>
 */
class InstafeedAsset extends AssetBundle
{
    public $sourcePath = '@bower/instafeed.js';
    public $css = [
    ];
    public $js = [  // Configured conditionally (source/minified) during init()
    ];
    public $depends = [
    ];

    public function init()
    {
        parent::init();
        $this->js[] = YII_DEBUG ? 'instafeed.js' : 'instafeed.min.js';
    }
}
