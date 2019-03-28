<?php

namespace app\models;

use app\components\map\enum\Items;
use app\components\map\enum\Payloads;
use app\components\map\items\Border;
use app\components\map\items\Bullet;
use app\components\map\items\Road;
use app\components\map\items\Tank;
use app\components\map\items\WoodBlock;
use app\components\map\MapItemInterface;
use yii\base\InvalidConfigException;
use yii\db\ActiveQuery;
use yii\db\ActiveRecord;

/**
 * This is the model class for table "map_items".
 *
 * @property int $id
 * @property int $map_id
 * @property string $type
 * @property string $payload_type
 * @property int $position_x
 * @property int $position_y
 *
 * @property Map $map
 */
class MapItem extends ActiveRecord
{
    /**
     * @return string
     */
    public static function tableName(): string
    {
        return 'map_items';
    }

    /**
     * @return array
     */
    public function rules(): array
    {
        return [
            [['map_id', 'type', 'position_x', 'position_y'], 'required'],
            [['map_id', 'position_x', 'position_y'], 'integer'],
            [['type', 'payload_type'], 'string', 'max' => 255],
            [
                ['map_id', 'position_x', 'position_y'],
                'unique',
                'targetAttribute' => ['map_id', 'position_x', 'position_y']
            ],
            [
                ['map_id'],
                'exist',
                'targetClass' => Map::class,
                'targetAttribute' => ['map_id' => 'id']
            ]
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getMap(): ActiveQuery
    {
        return $this->hasOne(Map::class, ['id' => 'map_id']);
    }

    /**
     * @return MapItemInterface
     * @throws InvalidConfigException
     */
    public function getItemObject(): MapItemInterface
    {
        switch ($this->type) {
            case Items::BORDER:
                $item = new Border();
                break;
            case Items::ROAD:
                $item = new Road();
                break;
            case Items::WOOD_BLOCK:
                $item = new WoodBlock();
                break;
            default:
                throw new InvalidConfigException("Item '{$this->type}' is incorrect");
        }

        if (empty($this->payload_type)) {
            return $item;
        }

        switch ($this->payload_type) {
            case Payloads::TANK:
                $item->setPayload(new Tank());
                break;
            case Payloads::BULLET:
                $item->setPayload(new Bullet());
                break;
            default:
                throw new InvalidConfigException("Payload '{$this->payload_type}' is incorrect");
        }

        return $item;
    }
}
