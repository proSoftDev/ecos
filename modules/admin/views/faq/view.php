<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\Faq */

$this->title = $model->question;
$this->params['breadcrumbs'][] = ['label' => 'Вопрос-ответ', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>
<div class="faq-view">

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
            'question',
            [
                'format' => 'raw',
                'attribute' => 'answer',
                'value' => function($data){
                    return $data->answer;
                }
            ],
            'question_en',
            [
                'format' => 'raw',
                'attribute' => 'answer_en',
                'value' => function($data){
                    return $data->answer_en;
                }
            ],
            'question_kz',
            [
                'format' => 'raw',
                'attribute' => 'answer_kz',
                'value' => function($data){
                    return $data->answer_kz;
                }
            ],
            [
                'attribute'=>'status',
                'value' => function ($model) {
                    return \app\modules\admin\controllers\Label::statusLabel($model->status);
                },
                'format' => 'raw',
            ],
            'created',
        ],
    ]) ?>

</div>
