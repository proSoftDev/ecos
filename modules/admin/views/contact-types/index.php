<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\search\ContactTypesSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = ' Содержание';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="contact-types-index">

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
                'format' => 'raw',
                'attribute' => 'content',
                'value' => function($data){
                    return $data->content;
                }
            ],

            [
                'attribute'=>'contact_type_id',
                'filter'=>\app\models\ContactType::getList(),
                'value'=>function($model){
                    return $model->contactType->name;
                },
            ],

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
</div>
