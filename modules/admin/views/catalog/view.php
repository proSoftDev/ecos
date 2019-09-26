<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\Catalog */

$this->title = $model->name;
$this->params['breadcrumbs'][] = ['label' => 'Партнеры и категории', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>
<div class="catalog-view">

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

    <? if($model->level == 1 ):?>
    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
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
                'attribute' => 'status',
                'filter' => \app\modules\admin\controllers\Label::statusList(),
                'value' => function ($model) {
                    return \app\modules\admin\controllers\Label::statusLabel($model->status);
                },
                'format' => 'raw',
            ],
            [
                'format' => 'raw',
                'attribute' => 'content',
                'value' => function($data){
                    return $data->content;
                }
            ],

            'name_en',
            [
                'format' => 'raw',
                'attribute' => 'content_en',
                'value' => function($data){
                    return $data->content_en;
                }
            ],
            'name_kz',
            [
                'format' => 'raw',
                'attribute' => 'content_kz',
                'value' => function($data){
                    return $data->content_kz;
                }
            ],
            [
                'format' => 'html',
                'attribute' => 'image',
                'value' => function($data){
                    return Html::img($data->getImage(), ['width'=>200]);
                }
            ],
            'created_at',
        ],
    ]) ?>

    <? endif;?>

    <? if($model->level > 1):?>
        <?= DetailView::widget([
            'model' => $model,
            'attributes' => [
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
                    'attribute' => 'status',
                    'filter' => \app\modules\admin\controllers\Label::statusList(),
                    'value' => function ($model) {
                        return \app\modules\admin\controllers\Label::statusLabel($model->status);
                    },
                    'format' => 'raw',
                ],
                'name_en',
                'name_kz',
                'created_at',
            ],
        ]) ?>
    <? endif;?>

</div>
