<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\Product */

$this->title = $model->name;
$this->params['breadcrumbs'][] = ['label' => 'Продукты', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>
<div class="product-view">

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
            [
                'format' => 'raw',
                'attribute' => 'contenta',
                'value' => function($data){
                    return $data->contenta;
                }
            ],
            [
                'format' => 'raw',
                'attribute' => 'contentb',
                'value' => function($data){
                    return $data->contentb;
                }
            ],
            'keyword:ntext',
            'name_en',
            [
                'format' => 'raw',
                'attribute' => 'contenta_en',
                'value' => function($data){
                    return $data->contenta_en;
                }
            ],
            [
                'format' => 'raw',
                'attribute' => 'contentb_en',
                'value' => function($data){
                    return $data->contentb_en;
                }
            ],
            'keyword_en:ntext',
            'name_kz',
            [
                'format' => 'raw',
                'attribute' => 'contenta_kz',
                'value' => function($data){
                    return $data->contenta_kz;
                }
            ],
            [
                'format' => 'raw',
                'attribute' => 'contentb_kz',
                'value' => function($data){
                    return $data->contentb_kz;
                }
            ],
            'keyword_kz:ntext',
            [
                'attribute'=>'catalog_id',
                'value' => function ($model) {
                    return
                        Html::a($model->catalog->name, ['/admin/catalog/view', 'id' => $model->catalog->id]);
                },
                'format' => 'raw',
            ],
        ],
    ]) ?>

    <tr>

        <? foreach ($images as $v):?>
            <td>
                <img src="/uploads/images/product/<?=$v->image?>" width="200">
            </td>
        <? endforeach;?>

    </tr>

</div>
