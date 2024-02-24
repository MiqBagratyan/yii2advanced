<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/** @var yii\web\View $this */
/** @var frontend\models\ClubsClients $model */

$this->title = $model->client_id;
$this->params['breadcrumbs'][] = ['label' => 'Clubs Clients', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>
<div class="clubs-clients-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Update', ['update', 'client_id' => $model->client_id, 'club_id' => $model->club_id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Delete', ['delete', 'client_id' => $model->client_id, 'club_id' => $model->club_id], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'Are you sure you want to delete this item?',
                'method' => 'post',
            ],
        ]) ?>
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'client_id',
            'club_id',
        ],
    ]) ?>

</div>
