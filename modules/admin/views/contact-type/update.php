<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\ContactType */

$this->title = 'Редактирвание : ' . $model->name;
$this->params['breadcrumbs'][] = ['label' => 'Виды', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->name, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="contact-type-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>