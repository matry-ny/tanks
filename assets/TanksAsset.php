<?php

namespace app\assets;

use yii\web\AssetBundle;
use yii\web\JqueryAsset;

/**
 * Class TanksAsset
 * @package app\assets
 */
class TanksAsset extends AssetBundle
{
    /**
     * @var array
     */
    public $css = [
        'css/tanks.css'
    ];

    /**
     * @var array
     */
    public $js = [
        'js/tanks.js'
    ];

    /**
     * @var array
     */
    public $depends = [
        JqueryAsset::class
    ];
}
