<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Contact */

$this->title = 'Редактирование ' ;
$this->params['breadcrumbs'][] = ['label' => 'Наши контакты', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="contact-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
