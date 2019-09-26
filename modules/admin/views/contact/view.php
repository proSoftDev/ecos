<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\Contact */

$this->title = ' Наши контакты';
$this->params['breadcrumbs'][] = ['label' => 'Наши контакты'];

\yii\web\YiiAsset::register($this);
?>
<div class="contact-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Редактировать', ['update', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>

    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'address:ntext',
            'tel',
            'fax',
            'email:email',
            'address_en:ntext',
            'address_kz:ntext',
        ],
    ]) ?>

</div>
