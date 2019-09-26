<div class="border mt-4"></div>
<div class="container mb-4">
    <div class="row">
        <div class="col-sm-12 col-md">
            <nav class="menu" id="main-nav">
                <ul>
                    <? foreach (Yii::$app->view->params['headerMenu'] as $v):?>
                        <li class="<?=$v->url == "/partner/all"?"acting":"";?>"><a href="<?=$v->url;?>"><?=$v->name;?></a></li>
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
<div class="partners-content">
    <div class="container">
        <div class="row mt-5 mb-4">
            <div class="col-sm-12 col-md">
                <h2 class="partners-h2"><?=$model->name;?></h2>
            </div>
        </div>
    </div>

    <? $class = "";$m = 0;?>
    <? foreach ($partners as $v):?>
        <? $m++;?>
        <? if($m % 3 == 1):?>
        <div class="container <?=$class;?>">
            <div class="row">
        <? endif;?>
                <div class="col-sm-12 col-md-4 separator">
                    <img src="<?=$v->getImage();?>">
                    <p><?=$v->getName();?></p>
                    <p><?=\app\controllers\ContentController::cutStr($v->getContent(),300);?></p>
                    <a href="/partner?id=<?=$v->id;?>" class="more"><?=Yii::$app->view->params['translation'][16]->text;?></a>
                </div>
        <? if($m % 3 == 0):?>
            </div>
        </div>
        <? endif;?>
        <? $class = "mt-3";?>
    <? endforeach;?>
    <? if($m % 3 != 0):?>
        </div>
    </div>
    <? endif;?>
</div>


<div class="border mt-4"></div>