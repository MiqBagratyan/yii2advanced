<?php

use yii\helpers\Html;
use yii\bootstrap5\ActiveForm;
use yii\jui\DatePicker;


/** @var yii\web\View $this */
/** @var frontend\models\Clubs $model */
/** @var yii\widgets\ActiveForm $form */
?>

<div class="clubs-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'name')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'adress')->textarea(['rows' => 6]) ?>

<!--    --><?//= $form->field($model, 'create_date')->textInput() ?>
<!---->
<!--    --><?//= $form->field($model, 'create_user_id')->textInput() ?>
<!---->
<!--    --><?//= $form->field($model, 'update_date')->textInput() ?>
<!---->
<!--    --><?//= $form->field($model, 'update_user_id')->textInput() ?>
<!---->
<!--    --><?//= $form->field($model, 'delete_date')->textInput() ?>
<!---->
<!--    --><?//= $form->field($model, 'delete_user_id')->textInput() ?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
