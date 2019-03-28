<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%map_items}}`.
 */
class m190328_185239_create_map_items_table extends Migration
{
    private const MAP_KEY = 'fk-map_items-map_id-maps-id';
    private const UNIQUE_INDEX = 'i-unique-map_items-map_id-position_x-position_y';

    public function safeUp()
    {
        $this->createTable('{{%map_items}}', [
            'id' => $this->primaryKey(),
            'map_id' => $this->integer()->notNull(),
            'type' => $this->string()->notNull(),
            'payload_type' => $this->string()->null(),
            'position_x' => $this->integer(),
            'position_y' => $this->integer()
        ]);
        $this->addForeignKey(
            self::MAP_KEY,
            '{{%map_items}}',
            'map_id',
            '{{%maps}}',
            'id',
            'CASCADE',
            'CASCADE'
        );
        $this->createIndex(
            self::UNIQUE_INDEX,
            '{{%map_items}}',
            ['map_id', 'position_x', 'position_y'],
            true
        );
    }

    public function safeDown()
    {
        $this->dropForeignKey(self::MAP_KEY, '{{%map_items}}');
        $this->dropIndex(self::UNIQUE_INDEX, '{{%map_items}}');
        $this->dropTable('{{%map_items}}');
    }
}
