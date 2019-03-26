<?php

namespace app\components\map\items;

use app\components\map\MapItemInterface;

/**
 * Class Road
 * @package app\components\map\items
 */
class Road implements MapItemInterface
{
    /**
     * @return string
     */
    public function draw(): string
    {
        return __CLASS__;
    }
}
