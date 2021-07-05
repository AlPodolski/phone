<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\helpers\ArrayHelper;
use common\models\ClientCategory;

/* @var $this yii\web\View */
/* @var $model common\models\ClientCategory */
/* @var $form yii\widgets\ActiveForm */

$category = ArrayHelper::map(ClientCategory::getParentItems(), 'id', 'value');

$category[0] = 'Родительская категория';

?>

<div class="client-category-form">

    <?php $form = ActiveForm::begin(); ?>

    <div class="row">
        <div class="col-6">
            <?= $form->field($model, 'value')->textInput(['maxlength' => true]) ?>
        </div>
        <div class="col-6">
            <?= $form->field($model, 'parent_id')
                ->dropDownList($category) ?>
        </div>
    </div>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
