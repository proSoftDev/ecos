<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\Banner */

$this->title = $model->name;
$this->params['breadcrumbs'][] = ['label' => 'Баннер', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>
<div class="banner-view">

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
            'name',
            'subname',
            'name_en',
            'subname_en',
            'name_kz',
            'subname_kz',
            [
                'format' => 'html',
                'attribute' => 'image',
                'filter' => '',
                'value' => function($data){
                    return Html::img($data->getImage(), ['width'=>200]);
                }
            ],
        ],
    ]) ?>

</div>
