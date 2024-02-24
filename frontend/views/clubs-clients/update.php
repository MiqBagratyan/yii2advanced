<?php

use yii\helpers\Html;

/** @var yii\web\View $this */
/** @var frontend\models\ClubsClients $model */

$this->title = 'Update Clubs Clients: ' . $model->client_id;
$this->params['breadcrumbs'][] = ['label' => 'Clubs Clients', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->client_id, 'url' => ['view', 'client_id' => $model->client_id, 'club_id' => $model->club_id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="clubs-clients-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
