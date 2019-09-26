<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\search\ProductFileSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = ' Документы';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="product-file-index">

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
                'attribute'=>'product_id',
                'filter'=>\app\models\Product::getList(),
                'value' => function ($model) {
                    return
                        Html::a($model->product->name, ['/admin/product/view', 'id' => $model->product->id]);
                },
                'format' => 'raw',
            ],
//            'name_en',
            //'file_en',
            //'name_kz',
            //'file_kz',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
</div>
