<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\ContactType */

$this->title = $model->name;
$this->params['breadcrumbs'][] = ['label' => 'Виды', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>
<div class="contact-type-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Редактировать', ['update', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>
<!--        --><?//= Html::a('Удалить', ['delete', 'id' => $model->id], [
//            'class' => 'btn btn-danger',
//            'data' => [
//                'confirm' => 'Are you sure you want to delete this item?',
//                'method' => 'post',
//            ],
//        ]) ?>
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'id',
            'name',
            [
                'format' => 'raw',
                'attribute' => 'content',
                'value' => function($data){
                    return $data->content;
                }
            ],
            'iframe',
            'name_en',
            [
                'format' => 'raw',
                'attribute' => 'content_en',
                'value' => function($data){
                    return $data->content_en;
                }
            ],
            'iframe_en',
            'name_kz',
            [
                'format' => 'raw',
                'attribute' => 'content_kz',
                'value' => function($data){
                    return $data->content_kz;
                }
            ],
            'iframe_kz',
        ],
    ]) ?>

</div>
