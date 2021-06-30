<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model common\models\PhoneReview */

$this->title = 'Create Phone Review';
$this->params['breadcrumbs'][] = ['label' => 'Phone Reviews', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="phone-review-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
