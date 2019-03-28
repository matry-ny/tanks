<?php

use app\components\map\enum\Items;
use app\components\map\enum\Payloads;
use yii\db\Migration;

/**
 * Class m190328_190252_set_up_simple_map
 */
class m190328_190252_set_up_simple_map extends Migration
{
    public function safeUp()
    {
        $this->insert('{{%maps}}', []);
        $mapId = $this->getDb()->getLastInsertID();

        $mapItems = [
            [$mapId, Items::BORDER, null, 0, 0],
            [$mapId, Items::BORDER, null, 0, 1],
            [$mapId, Items::BORDER, null, 0, 2],
            [$mapId, Items::BORDER, null, 0, 3],
            [$mapId, Items::BORDER, null, 0, 4],

            [$mapId, Items::BORDER, null, 1, 0],
            [$mapId, Items::ROAD, Payloads::BULLET, 1, 1],
            [$mapId, Items::ROAD, null, 1, 2],
            [$mapId, Items::ROAD, null, 1, 3],
            [$mapId, Items::BORDER, null, 1, 4],

            [$mapId, Items::BORDER, null, 2, 0],
            [$mapId, Items::ROAD, null, 2, 1],
            [$mapId, Items::WOOD_BLOCK, null, 2, 2],
            [$mapId, Items::ROAD, null, 2, 3],
            [$mapId, Items::BORDER, null, 2, 4],

            [$mapId, Items::BORDER, null, 3, 0],
            [$mapId, Items::ROAD, Payloads::TANK, 3, 1],
            [$mapId, Items::ROAD, null, 3, 2],
            [$mapId, Items::ROAD, null, 3, 3],
            [$mapId, Items::BORDER, null, 3, 4],

            [$mapId, Items::BORDER, null, 4, 0],
            [$mapId, Items::BORDER, null, 4, 1],
            [$mapId, Items::BORDER, null, 4, 2],
            [$mapId, Items::BORDER, null, 4, 3],
            [$mapId, Items::BORDER, null, 4, 4]
        ];

        $this->batchInsert(
            '{{%map_items}}',
            [
                'map_id',
                'type',
                'payload_type',
                'position_x',
                'position_y'
            ],
            $mapItems
        );
    }

    public function safeDown()
    {
        $this->delete('{{%maps}}');
    }
}
