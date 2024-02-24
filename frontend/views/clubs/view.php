<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/** @var yii\web\View $this */
/** @var frontend\models\Clubs $model */

$this->title = $model->name;
$this->params['breadcrumbs'][] = ['label' => 'Clubs', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>
<div class="clubs-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Update', ['update', 'club_id' => $model->club_id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Delete', ['delete', 'club_id' => $model->club_id], [
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
            'club_id',
            'name',
            'adress:ntext',
            'create_date',
            'create_user_id',
            'update_date',
            'update_user_id',
            'delete_date',
            'delete_user_id',
        ],
    ]) ?>

</div>
