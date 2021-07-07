<?php


namespace frontend\components\helpers;


use common\models\City;
use common\models\CityPhone;
use yii\base\BaseObject;

class AddReviewHelper
{
    public static function getCity($cityName)
    {
        return City::find()
            ->where(['name' => $cityName])
            ->orWhere(['value' => $cityName])
            ->one();
    }

    public static function addCity($city_id, $phone_id)
    {
        if (!CityPhone::find()->where(['city_id' => $city_id, 'phone_id' => $phone_id])->one()){

            $cityPhone = new CityPhone();

            $cityPhone->phone_id = $phone_id;

            $cityPhone->city_id = $city_id;

            if ($cityPhone->validate() and $cityPhone->save())
                $result[] = 'Добавлен новый город на котором встречается этот номер';

            else $result[] = $cityPhone->getErrors();

        } $result[] = 'На этом городе уже есть этот номер';

        return $result;

    }
}