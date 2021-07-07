<?php

use yii\db\Migration;

/**
 * Class m210707_064458_add_client_category_to_phones_review_table
 */
class m210707_064458_add_client_category_to_phones_review_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->addColumn('phone_review', 'client_category_id', $this->integer());
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropColumn('phone_review', 'client_category_id');
    }

}
