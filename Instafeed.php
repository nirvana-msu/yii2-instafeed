<?php
/**
 * @link https://github.com/nirvana-msu/yii2-instafeed
 * @copyright Copyright (c) 2016 Alexander Stepanov
 * @license MIT
 */

namespace nirvana\instafeed;

use Yii;
use yii\base\Widget;
use yii\helpers\Html;
use yii\helpers\Json;
use yii\web\View;

/**
 * This widget publishes assets and registers necessary code to run plugin.
 * It also optionally renders a div container that plugin would automatically look for, to fill with thumbnails.
 * You can control the name of a created javascript plugin variable by configuring widget id.
 *
 * For more examples and documentation visit https://github.com/stevenschobert/instafeed.js
 *
 * @author Alexander Stepanov <student_vmk@mail.ru>
 */
class Instafeed extends Widget
{
    /**
     * @var boolean whether to render `<div id="instafeed"></div>` container that plugin would look for by default
     */
    public $renderThumbnailDiv = true;

    /**
     * @var array instafeed javascript plugin options
     */
    public $pluginOptions = [];

    /**
     * Initializes the widget.
     * This method publishes & registers instafeed plugin assets
     */
    public function init()
    {
        InstafeedAsset::register($this->view);
    }

    /**
     * Executes the widget.
     * This method renders container div, if necessary, and registers javascript plugin code.
     */
    public function run()
    {
        if ($this->renderThumbnailDiv) {
            echo Html::tag('div', '', ['id' => 'instafeed']);
        }

        $pluginOptions = Json::encode($this->pluginOptions);
        $varName = 'instafeed_' . $this->id;

        $this->view->registerJs("var $varName = new Instafeed($pluginOptions); $varName.run();",
            View::POS_END, 'instafeed-' . $this->id);
    }
}
