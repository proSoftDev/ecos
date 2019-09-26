<?php

/* @var $this \yii\web\View */
/* @var $content string */

use app\assets\AdminAsset;
use yii\helpers\Html;
use yii\helpers\Url;
use yii\widgets\Breadcrumbs;

AdminAsset::register($this);


?>
<?php $this->beginPage() ?>
<!DOCTYPE html>
<html lang="<?= Yii::$app->language ?>">
<head>
    <meta charset="<?= Yii::$app->charset ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <?= Html::csrfMetaTags() ?>
    <title><?= Html::encode($this->title) ?></title>
    <?php $this->head() ?>
</head>
<body class="hold-transition skin-blue sidebar-mini">
<?php $this->beginBody() ?>

<div class="wrapper">

    <header class="main-header">
        <!-- Logo -->
        <a href="<?= Url::toRoute(['menu/index'])?>" class="logo">
            <span class="logo-mini"></span>
            <span class="logo-lg">Админ. Панель</span>
        </a>
<!--        --><?//= Html::a('<span class="logo-mini"></span><span class="logo-lg">Админ. панель</span>', ['default/index'], ['class' => 'logo']) ?>
        <nav class="navbar navbar-static-top">
            <a href="#" class="sidebar-toggle" data-toggle="push-menu" role="button">
                <span class="sr-only">Toggle navigation</span>
            </a>
            <div class="navbar-custom-menu">
                <ul class="nav navbar-nav">
                    <li class="dropdown notifications-menu">
                        <!-- Menu toggle button -->
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" title="Заявки">
                            <i class="fa fa-bell-o"></i>
                            <span class="label label-success"><?=count(Yii::$app->view->params['feedback']);?></span>
                        </a>
                        <ul class="dropdown-menu">
                            <li class="header">У вас <?=count(Yii::$app->view->params['feedback']);?> непрочитанных заявки</li>
                            <li>
                                <ul class="menu">

                                    <? if(Yii::$app->view->params['feedback'] != null):?>
                                        <? foreach (Yii::$app->view->params['feedback'] as $v):?>
                                        <li>
                                            <a href="/admin/feedback/view?id=<?=$v->id;?>">
                                                <i class="fa fa-user text-green"></i> <?=$v->fio;?>
                                            </a>
                                        </li>
                                        <? endforeach;?>
                                    <? endif;?>
                                </ul>
                            </li>
                            <li class="footer"><a href="/admin/feedback/">Посмотреть все заявки</a></li>
                        </ul>
                    </li>
                    <li class="dropdown user user-menu">
                        <!-- Menu Toggle Button -->
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" title="Админ">
                            <!-- The user image in the navbar-->
                            <img src="/private/dist/img/user2-160x160.jpg" class="user-image" alt="User Image">
                            <!-- hidden-xs hides the username on small devices so only the image appears. -->
                            <span class="hidden-xs">Alexander Pierce</span>
                        </a>
                        <ul class="dropdown-menu">
                            <!-- The user image in the menu -->
                            <li class="user-header">
                                <img src="/private/dist/img/user2-160x160.jpg" class="img-circle" alt="User Image">

                                <p>
                                    Alexander Pierce - Administrator
                                    <small>2017-2019</small>
                                </p>
                            </li>

                            <!-- Menu Footer-->
                            <li class="user-footer">
                                <div class="pull-left">
                                    <a href="/admin/admin-profile/index" class="btn btn-default btn-flat">Профиль</a>
                                </div>
                                <div class="pull-right">
                                    <a href="/auth/logout" class="btn btn-default btn-flat">Выйти</a>
                                </div>
                            </li>
                        </ul>
                    </li>

                </ul>
            </div>
        </nav>
    </header>

    <aside class="main-sidebar">
        <section class="sidebar">
            <div class="user-panel">
                <div class="pull-left image">
                    <img src="/private/dist/img/user2-160x160.jpg" class="img-circle" alt="User Image">
                </div>
                <div class="pull-left info">
                    <p>Alexander Pierce</p>
                    <a href="#"><i class="fa fa-circle text-success"></i> Online</a>
                </div>
            </div>
            <form action="#" method="get" class="sidebar-form">
                <div class="input-group">
                    <input type="text" name="q" class="form-control" placeholder="Поиск ...">
                    <span class="input-group-btn">
                <button type="submit" name="search" id="search-btn" class="btn btn-flat"><i class="fa fa-search"></i>
                </button>
              </span>
                </div>
            </form>
            <ul class="sidebar-menu" data-widget="tree">
                <li class="header">ОСНОВНАЯ НАВИГАЦИЯ</li>
            </ul>
            <?= dmstr\widgets\Menu::widget(
                [
                    'options' => ['class' => 'sidebar-menu tree', 'data-widget'=> 'tree'],
                    'items' => [
                        ['label' => 'Переводы', 'icon' => 'fa fa-user', 'url' => ['/admin/translation/'],'active' => $this->context->id == 'translation'],
                        ['label' => 'Меню', 'icon' => 'fa fa-user', 'url' => ['/admin/menu/'],'active' => $this->context->id == 'menu'],
                        [
                            'label' => 'Главная страница',
                            'icon' => 'fa fa-user',
                            'url' => '#',
                            'items' => [
                                ['label' => 'Баннер', 'icon' => 'fa fa-user', 'url' => ['/admin/banner/'],'active' => $this->context->id == 'banner'],
                            ],
                        ],
                        [
                            'label' => 'Продукция',
                            'icon' => 'fa fa-user',
                            'url' => '#',
                            'items' => [
                                ['label' => 'Партнеры и категории', 'icon' => 'fa fa-user', 'url' => ['/admin/catalog/'],'active' => $this->context->id == 'catalog'],
                                ['label' => 'Продукты', 'icon' => 'fa fa-user', 'url' => ['/admin/product/'],'active' => $this->context->id == 'product'],
                                ['label' => 'Документы', 'icon' => 'fa fa-user', 'url' => ['/admin/product-file/'],'active' => $this->context->id == 'product-file'],
                            ],
                        ],

                        [
                            'label' => 'Услуги',
                            'icon' => 'fa fa-user',
                            'url' => '#',
                            'items' => [
                                ['label' => 'Наши услуги', 'icon' => 'fa fa-user', 'url' => ['/admin/service/'],'active' => $this->context->id == 'service'],
                                ['label' => 'Картинки', 'icon' => 'fa fa-user', 'url' => ['/admin/service-image/'],'active' => $this->context->id == 'service-image'],
                            ],
                        ],

                        [
                            'label' => 'Контакты',
                            'icon' => 'fa fa-user',
                            'url' => '#',
                            'items' => [
                                ['label' => 'Наши контакты', 'icon' => 'fa fa-user', 'url' => ['/admin/contact/'],'active' => $this->context->id == 'contact'],
                                ['label' => 'Виды', 'icon' => 'fa fa-user', 'url' => ['/admin/contact-type/'],'active' => $this->context->id == 'contact-type'],
                            ],
                        ],

                        ['label' => 'Новости', 'icon' => 'fa fa-user', 'url' => ['/admin/news/'],'active' => $this->context->id == 'news'],
                        ['label' => 'О компании', 'icon' => 'fa fa-user', 'url' => ['/admin/about/'],'active' => $this->context->id == 'about'],
//                        ['label' => 'Партнеры', 'icon' => 'fa fa-user', 'url' => ['/admin/partner/'],'active' => $this->context->id == 'partner'],
                        ['label' => 'Вопрос-ответ', 'icon' => 'fa fa-user', 'url' => ['/admin/faq/'],'active' => $this->context->id == 'faq'],
                        ['label' => 'Эл. почта для связи', 'icon' => 'fa fa-user', 'url' => ['/admin/emailforrequest/'],'active' => $this->context->id == 'emailforrequest'],
                    ],
                ]
            ) ?>
        </section>
    </aside>



    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <?= Breadcrumbs::widget([
                'links' => isset($this->params['breadcrumbs']) ? $this->params['breadcrumbs'] : [],
            ]) ?>

            <?=$content?>

        </section>
    </div>

    <!-- /.content-wrapper -->
    <footer class="main-footer">
        <div class="pull-right hidden-xs">
            <b>Version</b> 2.4.0
        </div>
        <strong>Copyright &copy; 2014-2019 <a href="https://adminlte.io">Almsaeed Studio</a>.</strong> All rights
        reserved.
    </footer>


    <div class="control-sidebar-bg"></div>
</div>

<?php $this->endBody() ?>
<?php $this->registerJsFile('/ckeditor/ckeditor.js');?>
<?php $this->registerJsFile('/ckfinder/ckfinder.js');?>
<script>
    $(document).ready(function(){
        var editor = CKEDITOR.replaceAll();
        CKFinder.setupCKEditor( editor );
    })
    $.widget.bridge('uibutton', $.ui.button);
</script>
</body>
</html>
<?php $this->endPage() ?>
