<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\search\ContactTypesSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="contact-types-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'id') ?>

    <?= $form->field($model, 'content') ?>

    <?= $form->field($model, 'url') ?>

    <?= $form->field($model, 'content_en') ?>

    <?= $form->field($model, 'url_en') ?>

    <?php // echo $form->field($model, 'content_kz') ?>

    <?php // echo $form->field($model, 'url_kz') ?>

    <?php // echo $form->field($model, 'contact_type_id') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
