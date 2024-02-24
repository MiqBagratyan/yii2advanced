<?php

use frontend\models\Clubs;
use yii\helpers\Html;
use yii\helpers\Url;
use yii\grid\ActionColumn;
use yii\grid\GridView;

/** @var yii\web\View $this */
/** @var yii\data\ActiveDataProvider $dataProvider */

$this->title = 'Clubs';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="clubs-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Create Clubs', ['create'], ['class' => 'btn btn-success']) ?>
    </p>


    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'club_id',
            'name',
            'adress:ntext',
            'create_date',
            'create_user_id',
            //'update_date',
            //'update_user_id',
            //'delete_date',
            //'delete_user_id',
            [
                'class' => ActionColumn::className(),
                'urlCreator' => function ($action, Clubs $model, $key, $index, $column) {
                    return Url::toRoute([$action, 'club_id' => $model->club_id]);
                 }
            ],
        ],
    ]); ?>


</div>
