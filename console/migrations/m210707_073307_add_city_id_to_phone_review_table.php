<?php

use yii\db\Migration;

/**
 * Class m210707_073307_add_city_id_to_phone_review_table
 */
class m210707_073307_add_city_id_to_phone_review_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->addColumn('phone_review', 'city_id', $this->integer());
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropColumn('phone_review', 'city_id');
    }
}
