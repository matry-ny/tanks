<?php

namespace app\components\map\items;

use app\components\map\MapItemInterface;

/**
 * Class Border
 * @package app\components\map\items
 */
class Border implements MapItemInterface
{
    /**
     * @return string
     */
    public function draw(): string
    {
        return __CLASS__;
    }
}
