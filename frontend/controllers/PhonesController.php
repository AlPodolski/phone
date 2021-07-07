<?php

namespace frontend\controllers;

use common\models\City;
use common\models\CityPhone;
use common\models\PhoneReview;
use common\models\Phones;
use frontend\components\helpers\AddReviewHelper;
use yii\base\BaseObject;
use yii\filters\auth\CompositeAuth;
use yii\filters\auth\HttpBasicAuth;
use yii\filters\auth\HttpBearerAuth;
use yii\filters\auth\QueryParamAuth;
use Yii;

class PhonesController extends \yii\rest\ActiveController
{


    public $serializer = [
        'class' => 'yii\rest\Serializer',
        'collectionEnvelope' => 'items',
    ];

    public function behaviors()
    {
        $behaviors = parent::behaviors();
        $behaviors['authenticator'] = [
            'class' => CompositeAuth::class,
            'authMethods' => [
                HttpBasicAuth::class,
                HttpBearerAuth::class,
                QueryParamAuth::class,
            ],
        ];
        return $behaviors;
    }

    public $modelClass = Phones::class;

    public function init()
    {
        parent::init();
        \Yii::$app->user->enableSession = false;
    }

    public function actions()
    {
        $actions = parent::actions();

        // отключить действия "delete" и "create"
        unset($actions['delete'], $actions['update']);

        return $actions;
    }

    public function actionView($id)
    {
        return Phones::find()->where(['phone' => $id])->with('review')->asArray()->one();
    }

    public function actionCheck($id)
    {
        return Phones::find()->where(['phone' => $id])->asArray()->one();
    }

    public function actionAddPhone($phone)
    {

        $city = false;

        if ($cityName = Yii::$app->request->post('city')){

            if (!$city = AddReviewHelper::getCity($cityName)){
                $result[] = 'Город не найден';
            }

        }else{

            $result[] = 'Город не указан';

        }

        if ($phoneClass = Phones::find()->where(['phone' => $phone])->one()){

            $result[] = 'Такой номер уже есть в базе';

        }else{

            $phoneClass = new Phones();

            $phoneClass->phone = $phone;

            if ($phoneClass->validate() and $phoneClass->save()){

                $result[] = $phoneClass;

            }else{

                $result[] = $phoneClass->getErrors();

            }

        }

        if ($city and isset($phoneClass->id) and $phoneClass->id){

            if (!CityPhone::find()->where(['city_id' => $city->id, 'phone_id' => $phoneClass->id])->one()){

                $cityPhone = new CityPhone();

                $cityPhone->phone_id = $phoneClass->id;

                $cityPhone->city_id = $city->id;

                if ($cityPhone->validate() and $cityPhone->save())
                    $result[] = 'Добавлен новый город на котором встречается этот номер';

                else $result[] = $cityPhone->getErrors();

            } $result[] = 'На этом городе уже есть этот номер';

        }

        return $result;

    }

    public function actionAddReview($phone)
    {

        $phone = preg_replace('/[^0-9]/', '', $phone);

        $text = Yii::$app->request->post('text');

        $category = Yii::$app->request->post('category');

        $cityName = Yii::$app->request->post('city');

        if ($cityName) {

            $city = AddReviewHelper::getCity($cityName);

        }

        if ($phoneData = Phones::find()->where(['phone' => $phone])->one()){

            $phoneReview = new PhoneReview();

            $phoneReview->phone_id = $phoneData->id;

            $phoneReview->review = $text;

            if (isset($city) and $city) $phoneReview->city_id = $city->id;

            $phoneReview->client_category_id = $category;

            $phoneReview->save();

            return $phoneReview;

        }else{



        }

    }

}
