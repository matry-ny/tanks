<?php

namespace app\components\map\items;

use yii\helpers\Html;
use app\components\map\PayloadInterface;

/**
 * Class Bullet
 * @package app\components\map\items
 */
class Bullet implements PayloadInterface
{
    /**
     * @return string
     */
    public function draw(): string
    {
        return Html::tag('div', '', [
            'class' => 'map-item map-item-payload bullet'
        ]);
    }
}
