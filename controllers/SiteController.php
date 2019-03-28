<?php

namespace app\controllers;

use app\assets\TanksAsset;
use app\components\Map;
use app\models\Map as MapModel;
use app\models\MapItem;
use yii\web\Controller;

/**
 * Class SiteController
 * @package app\controllers
 */
class SiteController extends Controller
{
    public function actionIndex()
    {
        $map = new Map();
        /** @var MapModel $mapModel */
        $mapModel = MapModel::find()->one();
        foreach ($mapModel->getMapItems()->each() as $item) {
            /** @var MapItem $item */
            $map->setItem(
                $item->position_x,
                $item->position_y,
                $item->getItemObject()
            );
        }

        $this->getView()->registerAssetBundle(TanksAsset::class);
        return $this->render('game', ['map' => $map]);
    }
}
