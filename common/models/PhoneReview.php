<?php

namespace common\models;

use Yii;
use yii\behaviors\TimestampBehavior;

/**
 * This is the model class for table "phone_review".
 *
 * @property int|null $phone_id
 * @property string|null $review
 * @property int $id
 * @property int|null $created_at
 * @property int|null $updated_at
 * @property int|null $status 0 отзыв не подтвержден 1 отзыв пубоикуется 
 */
class PhoneReview extends \yii\db\ActiveRecord
{

    const CHECK_REVIEW = 1;
    const NOT_CHECK_REVIEW = 0;

    public function behaviors()
    {
        return [
            [
                'class' => TimestampBehavior::class,
                'attributes' => [
                    PhoneReview::EVENT_BEFORE_INSERT => ['created_at', 'updated_at'],
                    PhoneReview::EVENT_BEFORE_UPDATE => ['updated_at'],
                ],
            ],
        ];
    }
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
            [['phone_id', 'created_at', 'updated_at', 'status'], 'integer'],
            [['review'], 'string', 'max' => 255],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'phone_id' => 'Ид телефона',
            'review' => 'Отзыв',
            'id' => 'ID',
            'created_at' => 'Дата создания',
            'updated_at' => 'Дата обновления',
            'status' => 'Status',
        ];
    }
}
