<?php

use kartik\file\FileInput;
use mihaildev\ckeditor\CKEditor;
use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\Product */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="product-form" style="padding-bottom: 3400px;">

    <?php $form = ActiveForm::begin(); ?>


    <div class="col-md-12 pl-0 pr-0">
        <div class="form-group" style="float: right;margin-top:7px;">
            <?= Html::submitButton('Сохранить', ['class' => 'btn btn-success']) ?>
        </div>
        <ul id="myTab" role="tablist" class="nav nav-tabs">
            <li class="nav-item active">
                <a id="home-tab" data-toggle="tab" href="#home" role="tab" aria-controls="home" aria-selected="true" class="nav-link active">RU</a>
            </li>
            <li class="nav-item">
                <a id="en-tab" data-toggle="tab" href="#en" role="tab" aria-controls="en" aria-selected="false" class="nav-link">EN</a>
            </li>
            <li class="nav-item">
                <a id="kz-tab" data-toggle="tab" href="#kz" role="tab" aria-controls="kz" aria-selected="false" class="nav-link">KZ</a>
            </li>
        </ul>
        <div id="myTabContent" class="tab-content bg-white box-shadow p-4 mb-4">

            <div id="en" role="tabpanel" aria-labelledby="en-tab" class="tab-pane fade">

                <?= $form->field($model, 'name_en')->textInput(['maxlength' => true]) ?>


                <?php
                echo $form->field($model, 'contenta_en')->widget(CKEditor::className(),[
                    'editorOptions' => [
                        'preset' => 'full', // basic, standard, full
                        'inline' => false, //по умолчанию false
                    ],
                ]);
                ?>

                <?php
                echo $form->field($model, 'contentb_en')->widget(CKEditor::className(),[
                    'editorOptions' => [
                        'preset' => 'full', // basic, standard, full
                        'inline' => false, //по умолчанию false
                    ],
                ]);
                ?>


                <?= $form->field($model, 'keyword_en')->textarea(['rows' => 6]) ?>

            </div>

            <div id="kz" role="tabpanel" aria-labelledby="kz-tab" class="tab-pane fade">

                <?= $form->field($model, 'name_kz')->textInput(['maxlength' => true]) ?>

                <?php
                echo $form->field($model, 'contenta_kz')->widget(CKEditor::className(),[
                    'editorOptions' => [
                        'preset' => 'full', // basic, standard, full
                        'inline' => false, //по умолчанию false
                    ],
                ]);
                ?>

                <?php
                echo $form->field($model, 'contentb_kz')->widget(CKEditor::className(),[
                    'editorOptions' => [
                        'preset' => 'full', // basic, standard, full
                        'inline' => false, //по умолчанию false
                    ],
                ]);
                ?>

                <?= $form->field($model, 'keyword_kz')->textarea(['rows' => 6]) ?>

            </div>

            <div id="home" role="tabpanel" aria-labelledby="home-tab" class="tab-pane fade show active in">

                <?= $form->field($model, 'name')->textInput(['maxlength' => true]) ?>

                <?php
                echo $form->field($model, 'contenta')->widget(CKEditor::className(),[
                    'editorOptions' => [
                        'preset' => 'full', // basic, standard, full
                        'inline' => false, //по умолчанию false
                    ],
                ]);
                ?>

                <?php
                echo $form->field($model, 'contentb')->widget(CKEditor::className(),[
                    'editorOptions' => [
                        'preset' => 'full', // basic, standard, full
                        'inline' => false, //по умолчанию false
                    ],
                ]);
                ?>

                <?= $form->field($model, 'keyword')->textarea(['rows' => 6]) ?>


                <?php
                echo $form->field($images, 'image[]')->widget(FileInput::classname(), [
                    'pluginOptions' => [
                        'showUpload' => false ,
                    ] ,
                    'options' => [
                        'multiple' => true,
                        'accept' => 'image/*'
                    ],
                ]);
                ?>

                <?= $form->field($model, 'catalog_id')->dropDownList(\app\models\Catalog::getList()) ?>


            </div>
        </div>
    </div>

    <?php ActiveForm::end(); ?>

</div>
