<?php

/* @var $this \yii\web\View */
/* @var $content string */

use app\assets\PublicAsset;
use yii\helpers\Html;
use yii\helpers\Url;

PublicAsset::register($this);



?>
<?php $this->beginPage() ?>
<!DOCTYPE html>
<html lang="<?= Yii::$app->language ?>">
<head>
    <title><?= Html::encode($this->title) ?></title>
    <link rel="shortcut icon" href="/public/images/logo2.png" type="image/png">
    <meta charset="<?= Yii::$app->charset ?>">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <?php $this->registerCsrfMetaTags() ?>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
    <?php $this->head() ?>
</head>
<body>
<?php $this->beginBody() ?>

<div class="<?=Yii::$app->view->params['page'];?>">
<!-- HEADER -->
<?=$this->render('_header')?>
<!-- END HEADER -->

<?=$content?>

<!-- FOOTER -->
<?=$this->render('_footer')?>
<!-- END FOOTER -->
</div>
<?php $this->endBody() ?>

</html>

<?php $this->endPage() ?>
