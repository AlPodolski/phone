<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model common\models\PhoneReview */

$this->title = 'Update Phone Review: ' . $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Phone Reviews', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="phone-review-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
