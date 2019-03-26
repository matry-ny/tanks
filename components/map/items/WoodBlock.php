<?php

namespace app\components\map\items;

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
        return __CLASS__;
    }
}
