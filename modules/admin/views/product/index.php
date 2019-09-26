<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\search\ProductSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Продукты';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="product-index">

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
//            'contenta:ntext',
//            'contentb:ntext',
//            'keyword:ntext',
            //'name_en',
            //'contenta_en:ntext',
            //'contentb_en:ntext',
            //'keyword_en:ntext',
            //'name_kz',
            //'contenta_kz:ntext',
            //'contentb_kz:ntext',
            //'keyword_kz:ntext',
            [
                'attribute'=>'catalog_id',
                'filter'=>\app\models\Catalog::getList(),
                'value' => function ($model) {
                    return
                        Html::a($model->catalog->name, ['/admin/catalog/view', 'id' => $model->catalog->id]);
                },
                'format' => 'raw',
            ],

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
</div>
