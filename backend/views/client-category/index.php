<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\widgets\Pjax;
/* @var $this yii\web\View */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Категории клиентов';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="client-category-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Создать новую категорию', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?php Pjax::begin(); ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id',
            'value',
            [
                'attribute' => 'parent_id',
                'format' => 'raw',
                'value' => function ($item) {

                    /* @var $item \common\models\ClientCategory */

                    if ($item->parent_id == 0) return 'Родительская категория';

                    else{

                        $data = \common\models\ClientCategory::getAll();

                        foreach ($data as $dataItem){

                            if ($item['parent_id'] == $dataItem['id']) return $dataItem['value'];

                        }

                    }

                },
            ],

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>

    <?php Pjax::end(); ?>

</div>
