<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%city_phone}}`.
 */
class m210702_055855_create_city_phone_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%city_phone}}', [
            'id' => $this->primaryKey(),
            'phone_id' => $this->integer(),
            'city_id' => $this->integer(),
        ]);

        $this->addForeignKey('fk_phone_id_id_phone', 'city_phone',
            'phone_id', 'phones', 'id', 'CASCADE', 'CASCADE');

        $this->addForeignKey('fk_city_id_id_city', 'city_phone',
            'city_id', 'city', 'id', 'CASCADE', 'CASCADE');

    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('{{%city_phone}}');
    }
}
