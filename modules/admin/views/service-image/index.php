<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\search\ServiceImageSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = ' Картинки';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="service-image-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Создать', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id',
            [
                'format' => 'html',
                'attribute' => 'image',
                'value' => function($data){
                    return Html::img($data->getImage(), ['width'=>100]);
                }
            ],
            [
                'attribute'=>'service_id',
                'filter'=>\app\models\Service::getList(),
                'value'=>function($model){
                    return $model->service->name;
                },
            ],

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
</div>
