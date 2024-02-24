<?php

use frontend\models\ClubsClients;
use yii\helpers\Html;
use yii\helpers\Url;
use yii\grid\ActionColumn;
use yii\grid\GridView;

/** @var yii\web\View $this */
/** @var yii\data\ActiveDataProvider $dataProvider */

$this->title = 'Clubs Clients';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="clubs-clients-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Create Clubs Clients', ['create'], ['class' => 'btn btn-success']) ?>
    </p>


    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'client_id',
            'club_id',
            [
                'class' => ActionColumn::className(),
                'urlCreator' => function ($action, ClubsClients $model, $key, $index, $column) {
                    return Url::toRoute([$action, 'client_id' => $model->client_id, 'club_id' => $model->club_id]);
                 }
            ],
        ],
    ]); ?>


</div>
