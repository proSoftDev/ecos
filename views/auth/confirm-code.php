<?php


use yii\captcha\Captcha;
use yii\helpers\Html;
use yii\bootstrap\ActiveForm;

$this->title = 'Подверждение кода';
$this->params['breadcrumbs'][] = $this->title;

?>
<div class="login-box">
    <div class="login-logo">
        <a href="#"><b>Admin</b>LTE</a>
    </div>
    <!-- /.login-logo -->
    <form class="login-box-body" action="/auth/confirm-code">
        <p class="login-box-msg">Введите код отправленный на почту админа</p>

        <?php if(Yii::$app->session->getFlash('code_error')):?>
            <div class="alert alert-danger" role="alert">
                <?= Yii::$app->session->getFlash('code_error'); ?>
            </div>
        <?php endif;?>

        <div class="form-group has-feedback">
            <input type="text" class="form-control" placeholder="Код" name="code" required>
            <span class="glyphicon glyphicon-envelope form-control-feedback"></span>
        </div>

        <div class="row">
            <div class="col-xs-4">
                <button type="submit" class="btn btn-primary btn-block btn-flat">Отправить</button>
            </div>
        </div>

    </form>
    <!-- /.login-box-body -->
</div><!-- /.login-box -->
