<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\ProductFile */

$this->title = $model->name;
$this->params['breadcrumbs'][] = ['label' => 'Документы', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>
<div class="product-file-view">

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

    <?php $filelink = $model->getFile('');?>
    <?php if($filelink != null) $file = ['attribute'=>'file','value' => Html::a('Посмотреть файл',$filelink,['target'=>'_blank']),'format' => 'raw' ];
    else $file = "file"?>

    <?php $filelink_en = $model->getFile('_en');?>
    <?php if($filelink_en != null) $file_en = ['attribute'=>'file_en','value' => Html::a('Посмотреть файл',$filelink_en,['target'=>'_blank']),'format' => 'raw' ];
    else $file_en = "file_en"?>

    <?php $filelink_kz = $model->getFile('_kz');?>
    <?php if($filelink_kz != null) $file_kz = ['attribute'=>'file_kz','value' => Html::a('Посмотреть файл',$filelink_kz,['target'=>'_blank']),'format' => 'raw' ];
    else $file_kz = "file_kz"?>


    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'id',
            'name',
            $file,
            'name_en',
            $file_en,
            'name_kz',
            $file_kz,
            [
                'attribute'=>'product_id',
                'filter'=>\app\models\Product::getList(),
                'value' => function ($model) {
                    return
                        Html::a($model->product->name, ['/admin/product/view', 'id' => $model->product->id]);
                },
                'format' => 'raw',
            ],
        ],
    ]) ?>

</div>
