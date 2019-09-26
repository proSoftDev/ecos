<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\ProductFile */

$this->title = 'Создание документа';
$this->params['breadcrumbs'][] = ['label' => 'Документы', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="product-file-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
