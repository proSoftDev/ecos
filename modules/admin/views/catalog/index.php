<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\search\CatalogSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */


$this->title = 'Партнеры и категории';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="catalog-index">

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
            'name',
            [
                'attribute' => 'parent_id',
                'value' => function ($model) {
                    return
                        Html::a($model->parent->name, ['view', 'id' => $model->parent->id]);
                },
                'format' => 'raw',
            ],
            [
                'value' => function ($model) {
                    return
                        Html::a('<span class="glyphicon glyphicon-arrow-up"></span>', ['move-up', 'id' => $model->id]) .
                        Html::a('<span class="glyphicon glyphicon-arrow-down"></span>', ['move-down', 'id' => $model->id]);
                },
                'format' => 'raw',
                'contentOptions' => ['style' => 'text-align: center'],
            ],

            [
                'attribute' => 'status',
                'filter' => \app\modules\admin\controllers\Label::statusList(),
                'value' => function ($model) {
                    return \app\modules\admin\controllers\Label::statusLabel($model->status);
                },
                'format' => 'raw',
            ],
            //'name_en',
            //'name_kz',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
</div>
