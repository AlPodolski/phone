<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use common\models\PhoneReview;

/* @var $this yii\web\View */
/* @var $model common\models\PhoneReview */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="phone-review-form">

    <?php $form = ActiveForm::begin(); ?>
    <div class="container">
        <div class="row">
            <div class="col-md-4">
                <?= $form->field($model, 'phone_id')->textInput() ?>
            </div>
            <div class="col-md-4">
                <?= $form->field($model, 'review')->textInput(['maxlength' => true]) ?>
            </div>

            <div class="col-md-4">
                <?= $form->field($model, 'status')->dropDownList(
                        [
                            PhoneReview::NOT_CHECK_REVIEW => 'Ожидает проверки',
                            PhoneReview::CHECK_REVIEW => 'Проверен',
                        ]
                ) ?>
            </div>
            <div class="col-md-12">

                <strong>
                    Создано: <?php echo date("Y-m-d H:i:s",  $model->created_at) ?>
                </strong>

                <br>

                <strong>
                    Обновлено: <?php echo date("Y-m-d H:i:s",  $model->updated_at) ?>
                </strong>


            </div>
        </div>

        <div class="form-group">
            <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
        </div>

        <?php ActiveForm::end(); ?>
    </div>

</div>
