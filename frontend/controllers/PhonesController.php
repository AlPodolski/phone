<?php

namespace frontend\controllers;

use common\models\PhoneReview;
use common\models\Phones;
use yii\filters\auth\HttpBasicAuth;
use Yii;

class PhonesController extends \yii\rest\Controller
{


    public $serializer = [
        'class' => 'yii\rest\Serializer',
        'collectionEnvelope' => 'items',
    ];

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

    public function actionAddPhone($id)
    {

        $phone = new Phones();

        $phone->phone = $id;

        $phone->save();

        return $phone;

    }

    public function actionAddReview($id)
    {
        $text = Yii::$app->request->post('text');

        $phoneReview = new PhoneReview();

        $phoneReview->phone_id = $id;

        $phoneReview->review = $text;

        $phoneReview->save();

        return $phoneReview;

    }

}
