<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%phone_review}}`.
 */
class m210201_065508_create_phone_review_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%phone_review}}', [
            'phone_id' => $this->integer(),
            'review' => $this->string()
        ]);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('{{%phone_review}}');
    }
}
