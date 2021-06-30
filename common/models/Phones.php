<?php

namespace common\models;

use Yii;
use yii\behaviors\TimestampBehavior;

/**
 * This is the model class for table "phones".
 *
 * @property int $id
 * @property string|null $phone
 * @property integer|null $created_at
 * @property integer|null $updated_at
 */
class Phones extends \yii\db\ActiveRecord
{

    public function behaviors()
    {
        return [
            [
                'class' => TimestampBehavior::class,
                'attributes' => [
                    self::EVENT_BEFORE_INSERT => ['created_at', 'updated_at'],
                    self::EVENT_BEFORE_UPDATE => ['updated_at'],
                ],
            ],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'phones';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['phone'], 'string', 'max' => 25],
            [['created_at', 'updated_at'], 'integer'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'phone' => 'Phone',
            'created_at' => 'Дата создания',
        ];
    }

    public function getReview()
    {
        return $this->hasMany(PhoneReview::class, ['phone_id' => 'id'])->orderBy('id DESC');
    }
    public function getReviewCount()
    {
        return $this->hasOne(PhoneReview::class, ['phone_id' => 'id'])->count();
    }

}
