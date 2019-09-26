<?php


use yii\captcha\Captcha;
use yii\helpers\Html;
use yii\bootstrap\ActiveForm;

$this->title = 'Новый пароль';
$this->params['breadcrumbs'][] = $this->title;


?>
<div class="login-box">
    <div class="login-logo">
        <a href="#"><b>Admin</b>LTE</a>
    </div>
    <!-- /.login-logo -->
    <form class="login-box-body" action="/auth/new-password">
        <p class="login-box-msg">Изменение пароля</p>

        <?php if(Yii::$app->session->getFlash('set_password_error')):?>
            <div class="alert alert-danger" role="alert">
                <?= Yii::$app->session->getFlash('set_password_error'); ?>
            </div>
        <?php endif;?>
        <input name="code" type="hidden" value="<?=$code;?>">

        <div class="form-group has-feedback">
            <input type="password" class="form-control" placeholder="Новый пароль" name="password" required>
            <span class="glyphicon glyphicon-lock form-control-feedback"></span>
        </div>

        <div class="form-group has-feedback">
            <input type="password" class="form-control" placeholder="Подтвердите Пароль" name="confirmPassword" required>
            <span class="glyphicon glyphicon-lock form-control-feedback"></span>
        </div>
        <div class="row">
            <div class="col-xs-4">
                <button type="submit" class="btn btn-primary btn-block btn-flat">Изменить</button>
            </div>
        </div>
    </div>
</div>
