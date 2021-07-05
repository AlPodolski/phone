<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "client_category".
 *
 * @property int $id
 * @property string|null $value
 * @property int|null $parent_id ид родителя
 */
class ClientCategory extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'client_category';
    }

    public function afterSave($insert, $changedAttributes)
    {
        parent::afterSave($insert, $changedAttributes);

        Yii::$app->cache->delete('client_category_data');

    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['parent_id'], 'integer'],
            [['value'], 'string', 'max' => 255],
        ];
    }

    public static function getParentItems()
    {
        return self::find()->where(['parent_id' => 0 ])->all();
    }

    public static function getAll()
    {
        $data = Yii::$app->cache->get('client_category_data');

        if ($data === false) {
            // $data нет в кэше, вычисляем заново
            $data = self::find()->all();

            // Сохраняем значение $data в кэше. Данные можно получить в следующий раз.
            Yii::$app->cache->set('client_category_data', $data);
        }
        
        return $data;
        
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'value' => 'Value',
            'parent_id' => 'Parent ID',
        ];
    }
}
