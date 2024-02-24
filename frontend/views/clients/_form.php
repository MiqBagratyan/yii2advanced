<?php

use yii\helpers\Html;
use yii\bootstrap5\ActiveForm;
use yii\jui\DatePicker;
use yii\helpers\ArrayHelper;

/** @var yii\web\View $this */
/** @var frontend\models\Clients $model */
/** @var yii\widgets\ActiveForm $form */

$clubsList=ArrayHelper::map(\frontend\models\clubs::find()->all(),'club_id','name');
?>

<div class="clients-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'user_name')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'user_lastname')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'user_middle_name')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'gender')->dropDownList([ '1' => 'Male', '2' => 'Female', ], ['prompt' => 'Select Gender']) ?>

    <?= $form->field($model, 'birthday')->widget(DatePicker::classname(), [
        //'model' => $model,
        //'attribute' => 'date_of_birth',
        'dateFormat' => 'yyyy-MM-dd',
        'options' => ['class' => 'form-control'],
    ]) ?>

    <?= $form->field($model, 'club_id')->dropDownList(
        \yii\helpers\ArrayHelper::map(\frontend\models\clubs::find()->all(), 'club_id', 'name'),
        ['prompt' => 'Select Club']

    ) ?>
<!--    --><?//= $form->field($model, 'club_id')->dropDownList(
//        $clubsList,  // $clubsList should be an associative array with keys as club IDs and values as club names
//    ); ?>
<!--    --><?//= $form->field($model, 'create_date')->textInput() ?>

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
