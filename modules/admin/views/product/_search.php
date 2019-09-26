<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\search\ProductSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="product-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'id') ?>

    <?= $form->field($model, 'name') ?>

    <?= $form->field($model, 'contenta') ?>

    <?= $form->field($model, 'contentb') ?>

    <?= $form->field($model, 'keyword') ?>

    <?php // echo $form->field($model, 'image') ?>

    <?php // echo $form->field($model, 'name_en') ?>

    <?php // echo $form->field($model, 'contenta_en') ?>

    <?php // echo $form->field($model, 'contentb_en') ?>

    <?php // echo $form->field($model, 'keyword_en') ?>

    <?php // echo $form->field($model, 'name_kz') ?>

    <?php // echo $form->field($model, 'contenta_kz') ?>

    <?php // echo $form->field($model, 'contentb_kz') ?>

    <?php // echo $form->field($model, 'keyword_kz') ?>

    <?php // echo $form->field($model, 'catalog_id') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
