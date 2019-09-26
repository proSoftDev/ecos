<?php

use kartik\file\FileInput;
use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\ServiceImage */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="service-image-form">

    <?php $form = ActiveForm::begin(); ?>

    <?php
    echo $form->field($model, 'image')->widget(FileInput::classname(), [
        'pluginOptions' => [
            'showUpload' => false ,
        ] ,
        'options' => [
            'accept' => 'image/*'
        ],
    ]);
    ?>

    <?= $form->field($model, 'service_id')->dropDownList(\app\models\Service::getList()) ?>

    <div class="form-group" style="padding-bottom: 20px;">
        <?= Html::submitButton('Сохранить', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
