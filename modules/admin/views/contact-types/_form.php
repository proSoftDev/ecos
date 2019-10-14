<?php

use mihaildev\ckeditor\CKEditor;
use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\ContactTypes */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="contact-types-form" style="padding-bottom: 1000px;">

    <?php $form = ActiveForm::begin(); ?>

    <div class="col-md-12 pl-0 pr-0">
        <div class="form-group" style="float: right;margin-top:7px;">
            <?= Html::submitButton('Сохранить', ['class' => 'btn btn-success']) ?>
        </div>
        <ul id="myTab" role="tablist" class="nav nav-tabs">
            <li class="nav-item active">
                <a id="home-tab" data-toggle="tab" href="#home" role="tab" aria-controls="home" aria-selected="true" class="nav-link active">Общие</a>
            </li>

            <li class="nav-item">
                <a id="ru-tab" data-toggle="tab" href="#ru" role="tab" aria-controls="ru" aria-selected="false" class="nav-link">RU</a>
            </li>
            <li class="nav-item">
                <a id="en-tab" data-toggle="tab" href="#en" role="tab" aria-controls="en" aria-selected="false" class="nav-link">EN</a>
            </li>
            <li class="nav-item">
                <a id="kz-tab" data-toggle="tab" href="#kz" role="tab" aria-controls="kz" aria-selected="false" class="nav-link">KZ</a>
            </li>
        </ul>
        <div id="myTabContent" class="tab-content bg-white box-shadow p-4 mb-4">

            <div id="ru" role="tabpanel" aria-labelledby="ru-tab" class="tab-pane fade">

                <?php
                echo $form->field($model, 'content')->widget(CKEditor::className(),[
                    'editorOptions' => [
                        'preset' => 'full', // basic, standard, full
                        'inline' => false, //по умолчанию false
                    ],
                ]);
                ?>

            </div>


            <div id="en" role="tabpanel" aria-labelledby="en-tab" class="tab-pane fade">

                <?php
                echo $form->field($model, 'content_en')->widget(CKEditor::className(),[
                    'editorOptions' => [
                        'preset' => 'full', // basic, standard, full
                        'inline' => false, //по умолчанию false
                    ],
                ]);
                ?>


            </div>

            <div id="kz" role="tabpanel" aria-labelledby="kz-tab" class="tab-pane fade">

                <?php
                echo $form->field($model, 'content_kz')->widget(CKEditor::className(),[
                    'editorOptions' => [
                        'preset' => 'full', // basic, standard, full
                        'inline' => false, //по умолчанию false
                    ],
                ]);
                ?>

            </div>

            <div id="home" role="tabpanel" aria-labelledby="home-tab" class="tab-pane fade show active in">

                <?= $form->field($model, 'url')->textarea(['rows' => 6]) ?>

                <?= $form->field($model, 'contact_type_id')->dropDownList(\app\models\ContactType::getList()) ?>

            </div>
        </div>
    </div>

    <?php ActiveForm::end(); ?>

</div>
