<?php

namespace app\components\map;

use yii\helpers\Html;

/**
 * Class AbstractMapItem
 * @package app\components\map
 */
abstract class AbstractMapItem implements MapItemInterface
{
    /**
     * @var string
     */
    protected $htmlClass;

    /**
     * @var PayloadInterface|null
     */
    private $payload;

    /**
     * @param PayloadInterface $payload
     */
    public function setPayload(PayloadInterface $payload)
    {
        $this->payload = $payload;
    }

    /**
     * @param int $rowIndex
     * @param int $columnIndex
     * @return string
     */
    public function draw(int $rowIndex, int $columnIndex): string
    {
        $payloadHTML = $this->payload ? $this->payload->draw() : '';
        return Html::tag('div', $payloadHTML, [
            'class' => "map-item {$this->htmlClass}",
            'data' => ['x' => $rowIndex, 'y' => $columnIndex]
        ]);
    }
}
