<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "phone_review".
 *
 * @property int|null $phone_id
 * @property string|null $review
 */
class PhoneReview extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'phone_review';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['phone_id'], 'integer'],
            [['review'], 'string', 'max' => 255],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'phone_id' => 'Phone ID',
            'review' => 'Review',
        ];
    }
}
