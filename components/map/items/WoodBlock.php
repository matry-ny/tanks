<?php

namespace app\components\map\items;

use yii\helpers\Html;
use app\components\map\MapItemInterface;

/**
 * Class WoodBlock
 * @package app\components\map\items
 */
class WoodBlock implements MapItemInterface
{
    /**
     * @return string
     */
    public function draw(): string
    {
        return Html::tag('div', '', [
            'class' => 'map-column map-wood-block'
        ]);
    }
}
