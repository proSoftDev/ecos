<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\ContactTypes */

$this->title = 'Создание';
$this->params['breadcrumbs'][] = ['label' => 'Содержание', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="contact-types-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
