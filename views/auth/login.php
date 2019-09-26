<?php


use yii\captcha\Captcha;
use yii\helpers\Html;
use yii\bootstrap\ActiveForm;

$this->title = 'Авторизоваться';
$this->params['breadcrumbs'][] = $this->title;

$fieldOptions1 = [
    'options' => ['class' => 'form-group has-feedback'],
    'inputTemplate' => "{input}<span class='glyphicon glyphicon-envelope form-control-feedback'></span>"
];

$fieldOptions2 = [
    'options' => ['class' => 'form-group has-feedback'],
    'inputTemplate' => "{input}<span class='glyphicon glyphicon-lock form-control-feedback'></span>"
];

?>
<div class="login-box">
    <div class="login-logo">
        <a href="#"><b>Admin</b>LTE</a>
    </div>
    <!-- /.login-logo -->
    <div class="login-box-body">
        <p class="login-box-msg">Введите логин и пароль, для входа в Административную панель.</p>

        <?php if(Yii::$app->session->getFlash('set_password_success')):?>
        <div class="alert alert-success" role="alert">
            <?= Yii::$app->session->getFlash('set_password_success'); ?>
        </div>
        <?php endif;?>

        <?php $form = ActiveForm::begin(['id' => 'login-form', 'enableClientValidation' => false]); ?>

        <?= $form->field($model, 'username', $fieldOptions1)->textInput(['autofocus' => true]) ?>

        <?= $form->field($model, 'password', $fieldOptions2)->passwordInput() ?>

        <?= $form->field($model, 'verifyCode')->widget(Captcha::className(), [
            'template' => '<div class="capcha-img">{image}<br /><div id="refresh-captcha" class="btn btn-ticked add_sl_per">Обновить</div></div>',
            'imageOptions' => [
                'id' => 'my-captcha-image'
            ]
        ])->label(false)?>

        <?php $this->registerJs("
            $('body').on('click', '#refresh-captcha', function(e){
                e.preventDefault();
                $('#my-captcha-image').yiiCaptcha('refresh');
            });
        "); ?>

        <div class="personal-input">
            <input type="text" placeholder="Введите код с картинки" name="LoginForm[verifyCode]">
        </div>

        <div class="row">
            <div class="col-xs-8">
                <?= $form->field($model, 'rememberMe')->checkbox() ?>
            </div>
            <!-- /.col -->
            <div class="col-xs-4">
                <?= Html::submitButton('Войти', ['class' => 'btn btn-primary btn-block btn-flat', 'name' => 'login-button']) ?>
            </div>
            <!-- /.col -->
        </div>

        <a href="/auth/update-password">Забыли пароль?</a><br>


        <?php ActiveForm::end(); ?>
    </div>
    <!-- /.login-box-body -->
</div><!-- /.login-box -->
