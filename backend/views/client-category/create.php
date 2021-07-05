<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model common\models\ClientCategory */

$this->title = 'Создать новую категорию';
$this->params['breadcrumbs'][] = ['label' => 'Категории клиентов', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="client-category-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
