<?php

use yii\helpers\Html;

/** @var yii\web\View $this */
/** @var frontend\models\ClubsClients $model */

$this->title = 'Create Clubs Clients';
$this->params['breadcrumbs'][] = ['label' => 'Clubs Clients', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="clubs-clients-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
