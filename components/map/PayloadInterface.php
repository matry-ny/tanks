<?php

namespace app\components\map;

/**
 * Class PayloadInterface
 * @package app\components\map
 */
interface PayloadInterface
{
    /**
     * @return string
     */
    public function draw(): string;
}
