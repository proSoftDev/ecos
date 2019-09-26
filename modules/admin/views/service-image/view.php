<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\ServiceImage */

$this->title = $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Service Images', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>
<div class="service-image-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Редактировать', ['update', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Удалить', ['delete', 'id' => $model->id], [
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
            'id',
            [
                'format' => 'html',
                'attribute' => 'image',
                'filter' => '',
                'value' => function($data){
                    return Html::img($data->getImage(), ['width'=>300]);
                }
            ],
            [
                'attribute'=>'service_id',
                'value'=>function($model){
                    return $model->service->name;
                },
            ],
        ],
    ]) ?>

</div>
