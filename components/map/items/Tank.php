<?php

namespace app\components\map\items;

use yii\helpers\Html;
use app\components\map\PayloadInterface;

/**
 * Class Tank
 * @package app\components
 */
class Tank implements PayloadInterface
{
    /**
     * @return string
     */
    public function draw(): string
    {
        return Html::tag('div', '', [
            'class' => 'map-item map-item-payload tank up'
        ]);
    }
}
