<?php

namespace app\components;

use app\components\map\MapItemInterface;
use yii\helpers\Html;

/**
 * Class Map
 * @package app\components
 */
class Map
{
    /**
     * @var array
     */
    private $config = [];

    /**
     * @param int $x
     * @param int $y
     * @param MapItemInterface $item
     * @return Map
     */
    public function setItem(int $x, int $y, MapItemInterface $item): Map
    {
        $this->config[$x][$y] = $item;
        return $this;
    }

    /**
     * @return string
     */
    public function draw(): string
    {
        $mapHTML = Html::beginTag('div', ['class' => 'map-container']);
        foreach ($this->config as $rowIndex => $row) {
            $mapHTML .= Html::beginTag('div', ['class' => 'map-row']);
            foreach ($row as $columnIndex => $column) {
                /** @var MapItemInterface $column */
                $mapHTML .= $column->draw($rowIndex, $columnIndex);
            }
            $mapHTML .= Html::endTag('div');
        }
        $mapHTML .= Html::endTag('div');

        return $mapHTML;
    }
}
