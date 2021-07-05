<?php

use yii\db\Migration;

/**
 * Handles adding columns to table `{{%client_category}}`.
 */
class m210705_061027_add_parent_id_column_to_client_category_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->addColumn('client_category', 'parent_id', $this->integer()
            ->comment('ид родителя')
            ->defaultValue(0)
        );

    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropColumn('client_category', 'parent_id');
    }
}
