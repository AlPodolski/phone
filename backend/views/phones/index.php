<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\widgets\Pjax;
use common\models\Phones;

/* @var $this yii\web\View */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Phones';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="phones-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Create Phones', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?php Pjax::begin(); ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id',
            'phone',
            [
                'attribute' => 'created_at',
                'format' => 'raw',
                'value' => function ($item) {
                    /* @var $item Phones */

                    if ($item->created_at) return date("Y-m-d H:i:s", $item->created_at );

                    return '-';

                },
            ],
            [
                'attribute' => 'Отзывов',
                'format' => 'raw',
                'value' => function ($item) {
                    /* @var $item Phones */

                    return  $item->getReviewCount();

                },
            ],

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>

    <?php Pjax::end(); ?>

</div>
