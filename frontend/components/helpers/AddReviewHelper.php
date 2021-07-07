<?php


namespace frontend\components\helpers;


use common\models\City;

class AddReviewHelper
{
    public static function getCity($cityName)
    {
        return City::find()
            ->where(['name' => $cityName])
            ->orWhere(['value' => $cityName])
            ->one();
    }
}