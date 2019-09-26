<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\search\ProductFileSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="product-file-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'id') ?>

    <?= $form->field($model, 'name') ?>

    <?= $form->field($model, 'file') ?>

    <?= $form->field($model, 'product_id') ?>

    <?= $form->field($model, 'name_en') ?>

    <?php // echo $form->field($model, 'file_en') ?>

    <?php // echo $form->field($model, 'name_kz') ?>

    <?php // echo $form->field($model, 'file_kz') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
