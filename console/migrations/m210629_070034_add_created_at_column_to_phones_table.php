<?php

use yii\db\Migration;

/**
 * Handles adding columns to table `{{%phones}}`.
 */
class m210629_070034_add_created_at_column_to_phones_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->addColumn('phones', 'created_at', $this->integer());
        $this->addColumn('phones', 'updated_at', $this->integer());
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropColumn('phones', 'created_at');
        $this->dropColumn('phones', 'updated_at');
    }
}
