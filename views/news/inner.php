<div class="border mt-4"></div>
<div class="container mb-4">
    <div class="row">
        <div class="col-sm-12 col-md">
            <nav class="menu" id="main-nav">
                <ul>
                    <? foreach (Yii::$app->view->params['headerMenu'] as $v):?>
                        <li class="<?=$v->url == "/site/news"?"acting":"";?>"><a href="<?=$v->url;?>"><?=$v->name;?></a></li>
                    <? endforeach;?>
                </ul>
            </nav>
        </div>
    </div>
</div>
<div class="container mt-5 mb-5">
    <div class="row">
        <div class="col-sm-12 col-md">
            <p class="main-plink"><a href="/"><?=Yii::$app->view->params['main']->name;?> </a>
                <span>/ </span><a href="/news/all"><?=$model->name;?></a>
                <span>/ </span><?=$news->getName();?>
            </p>
        </div>
    </div>
</div>
<div class="news-content">
    <div class="container">
        <div class="row mt-5 mb-4">
            <div class="col-sm-12 col-md">
                <h1 class="news-h1"><?=$news->getName();?></h1>
            </div>
        </div>
    </div>
    <div class="container">
        <div class="row">
            <div class="col-sm-12 col-md-12">
                <img src="<?=$news->getImage();?>">
                <?=$news->getContent();?>
            </div>
        </div>
    </div>
</div>

<?=$this->render('/partials/partner.php')?>
<div class="border mt-4"></div>