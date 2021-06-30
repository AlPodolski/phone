<?php

use yii\helpers\Html;
use yii\widgets\DetailView;
use common\models\PhoneReview;

/* @var $this yii\web\View */
/* @var $model common\models\Phones */

$this->title = $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Phones', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>
<div class="phones-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Update', ['update', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Delete', ['delete', 'id' => $model->id], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'Are you sure you want to delete this item?',
                'method' => 'post',
            ],
        ]) ?>
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'id',
            'phone',
            'created_at',
        ],
    ]) ?>

    <h3>Отзывы</h3>

    <?php foreach ($model->review as $item) : ?>

        <?= DetailView::widget([
            'model' => $item,
            'attributes' => [
                'id',
                [
                    'attribute' => 'Редактировать',
                    'format' => 'raw',
                    'value' => function ($item) {
                        /* @var $item PhoneReview */

                        return Html::a('Редактировать', '/phone-review/update?id='.$item->id);

                    },
                ],
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
            ],
        ]) ?>

    <?php endforeach; ?>

</div>
