<?php

namespace app\components\map;

/**
 * Class MapItemInterface
 * @package app\components\map
 */
interface MapItemInterface
{
    /**
     * @param int $rowIndex
     * @param int $columnIndex
     * @return string
     */
    public function draw(int $rowIndex, int $columnIndex): string;
}
