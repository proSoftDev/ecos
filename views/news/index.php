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
            <p class="main-plink"><a href="/"><?=Yii::$app->view->params['main']->name;?> </a><span>/ </span><?=$model->name;?></p>
        </div>
    </div>
</div>
<div class="news-content">
    <div class="container">
        <div class="row mt-5 mb-4">
            <div class="col-sm-12 col-md">
                <h1 class="news-h1"><?=$model->name;?></h1>
            </div>
        </div>
    </div>
    <div class="container">
        <? $m = 0;$class = "";?>
        <? foreach ($news as $v):?>
            <? $m++;?>
            <? if($m % 4 == 1):?>
            <div class="row <?=$class;?>">
            <? $class = "mt-5";?>
            <? endif;?>
                <div class="col-sm-12 col-md-3">
                    <img src="<?=$v->getImage();?>">
                    <h3><?=$v->getName();?></h3>
                    <p>
                        <?=\app\controllers\ContentController::cutStr($v->getContent(),200);?>
                    </p>
                    <a href="/news?id=<?=$v->id;?>" class="more"><?=Yii::$app->view->params['translation'][16]->text;?></a>
                </div>
            <? if($m % 4 == 0):?>
            </div>
            <? endif;?>
        <? endforeach;?>
        <? if($m % 4 != 0):?>
        </div>
        <? endif;?>
    </div>

    <?=$this->render('/partials/partner.php')?>
    <div class="border mt-4"></div>
</div>