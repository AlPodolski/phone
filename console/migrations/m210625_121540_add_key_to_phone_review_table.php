<?php

use yii\db\Migration;

/**
 * Class m210625_121540_add_key_to_phone_review_table
 */
class m210625_121540_add_key_to_phone_review_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->addColumn('phone_review', 'id', $this->primaryKey());
        $this->addColumn('phone_review', 'created_at', $this->integer());
        $this->addColumn('phone_review', 'updated_at', $this->integer());
        $this->addColumn('phone_review', 'status', $this->integer()
            ->defaultValue(0)
            ->comment('0 отзыв не подтвержден 1 отзыв пубоикуется ')
        );
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropColumn('phone_review', 'id');
        $this->dropColumn('phone_review', 'created_at');
        $this->dropColumn('phone_review', 'updated_at');
        $this->dropColumn('phone_review', 'status');
    }

}
