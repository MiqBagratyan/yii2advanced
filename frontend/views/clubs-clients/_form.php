<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/** @var yii\web\View $this */
/** @var frontend\models\ClubsClients $model */
/** @var yii\widgets\ActiveForm $form */
?>

<div class="clubs-clients-form">

    <?php $form = ActiveForm::begin(); ?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
