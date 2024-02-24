<?php

use frontend\models\Clients;
use yii\helpers\Html;
use yii\helpers\Url;
use yii\grid\ActionColumn;
use yii\grid\GridView;

/** @var yii\web\View $this */
/** @var yii\data\ActiveDataProvider $dataProvider */

$this->title = 'Clients';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="clients-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Create Clients', ['create'], ['class' => 'btn btn-success']) ?>
    </p>


    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],
            'client_id',
            'user_name',
            'user_lastname',
            'user_middle_name',
            'gender',
            'birthday',
            'club_id',
            //'create_date',
            //'create_user_id',
            //'update_date',
            //'update_user_id',
            //'delete_date',
            //'delete_user_id',
            [
                'class' => ActionColumn::className(),
                'urlCreator' => function ($action, Clients $model, $key, $index, $column) {
                    return Url::toRoute([$action, 'client_id' => $model->client_id]);
                 }
            ],
        ],
    ]);
    ?>


</div>
