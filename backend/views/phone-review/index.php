<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\widgets\Pjax;
/* @var $this yii\web\View */
/* @var $searchModel backend\models\PhoneReview */
/* @var $dataProvider yii\data\ActiveDataProvider */

use common\models\PhoneReview;

$this->title = 'Phone Reviews';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="phone-review-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Create Phone Review', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?php Pjax::begin(); ?>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id',
            'phone_id',
            'review',
            [
                'attribute' => 'created_at',
                'format' => 'raw',
                'value' => function ($item) {
                    /* @var $item PhoneReview */

                    if ($item->created_at) return date("Y-m-d H:i:s", $item->created_at);

                    return '-';

                },
            ],
            [
                'attribute' => 'updated_at',
                'format' => 'raw',
                'value' => function ($item) {
                    /* @var $item PhoneReview */

                    if ($item->updated_at) return date("Y-m-d H:i:s", $item->updated_at);

                    return '-';

                },
            ],
            [
                'attribute' => 'status',
                'format' => 'raw',
                'value' => function ($item) {
                    /* @var $item PhoneReview */

                    switch ($item->status) {
                        case PhoneReview::CHECK_REVIEW:
                            return "Отзыв проверен";
                        case PhoneReview::NOT_CHECK_REVIEW:
                            return "Отзыв не проверен";
                    }

                    return '-';

                },
            ],

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>

    <?php Pjax::end(); ?>

</div>
