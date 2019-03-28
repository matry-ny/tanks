<?php

namespace app\models;

use yii\db\ActiveQuery;
use yii\db\ActiveRecord;

/**
 * This is the model class for table "maps".
 *
 * @property int $id
 *
 * @property MapItem[] $mapItems
 */
class Map extends ActiveRecord
{
    /**
     * @return string
     */
    public static function tableName(): string
    {
        return 'maps';
    }

    /**
     * @return ActiveQuery
     */
    public function getMapItems(): ActiveQuery
    {
        return $this->hasMany(MapItem::class, ['map_id' => 'id']);
    }
}
