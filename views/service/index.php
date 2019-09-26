<div class="border mt-4"></div>
<div class="container mb-4">
    <div class="row">
        <div class="col-sm-12 col-md">
            <nav class="menu" id="main-nav">
                <ul>
                    <? foreach (Yii::$app->view->params['headerMenu'] as $v):?>
                        <li class="<?=$v->url == "/service/all"?"acting":"";?>"><a href="<?=$v->url;?>"><?=$v->name;?></a></li>
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
<div class="services-content">
    <div class="container">
        <div class="row mt-5 mb-4">
            <div class="col-sm-12 col-md">
                <h2 class="services-h2"><?=$model->name;?></h2>
            </div>
        </div>
    </div>
    <? $m = 0;?>
    <? foreach ($service as $v):?>
        <? $m++;?>
        <div class="container">
            <div class="row">
                <div class="col-sm-12 col-md-4">
                    <img src="<?=$v->getImage();?>">
                </div>
                <div class="col-sm-12 col-md-8">
                    <div class="container">
                        <div class="row">
                            <div class="col-sm-12 col-md">
                                <h3><?=$v->getName();?></h3>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-sm-12 col-md">
                                <p>
                                    <?=\app\controllers\ContentController::cutStr($v->getContent(),200);?>
                                </p>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-sm-12 col-md">
                                <a href="/service?id=<?=$v->id;?>" class="more"><?=Yii::$app->view->params['translation'][16]->text;?></a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <? if(count($service) > $m):?>
            <div class="border mt-5 mb-5"></div>
        <? endif;?>
    <? endforeach;?>


    <?=$this->render('/partials/partner.php')?>
    <div class="border mt-4"></div>
</div>