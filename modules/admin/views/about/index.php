<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\search\AboutSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'О компании';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="about-index">

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
//            'content:ntext',
//            'name_en',
//            'content_en:ntext',
            //'name_kz',
            //'content_kz:ntext',

            ['class' => 'yii\grid\ActionColumn','template'=>'{update} {view}'],
        ],
    ]); ?>
</div>
