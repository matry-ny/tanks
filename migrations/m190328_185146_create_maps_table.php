<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%maps}}`.
 */
class m190328_185146_create_maps_table extends Migration
{
    public function safeUp()
    {
        $this->createTable('{{%maps}}', [
            'id' => $this->primaryKey()
        ]);
    }

    public function safeDown()
    {
        $this->dropTable('{{%maps}}');
    }
}
