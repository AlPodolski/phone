<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%client_category}}`.
 */
class m210629_102037_create_client_category_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%client_category}}', [
            'id' => $this->primaryKey(),
            'value' => $this->string(),
        ]);

        $this->insert('client_category', ['value' => 'Хороший клиент']);
        $this->insert('client_category', ['value' => 'Терпимый клиент']);
        $this->insert('client_category', ['value' => 'Жалоба на номер']);

    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('{{%client_category}}');
    }
}
