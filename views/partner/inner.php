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
            <p class="main-plink"><a href="/"><?=Yii::$app->view->params['main']->name;?> </a>
                <span>/ </span><a href="/partner/all"><?=$model->name;?></a>
                <span>/ </span><?=$partner->getName();?>
            </p>
        </div>
    </div>
</div>
<div class="partners-content">
    <div class="container">
        <div class="row mt-5 mb-4">
            <div class="col-sm-12 col-md">
                <img class="tulsk-logo" src="<?=$partner->getImage();?>">
            </div>
        </div>
    </div>
    <div class="container">
        <div class="row mb-4">
            <div class="col-sm-12 col-md">
                <h2 class="partners-h2"><?=$partner->getName();?></h2>
            </div>
        </div>
    </div>
    <div class="container">
        <div class="row">
            <?=$partner->getContent();?>
        </div>
    </div>
</div>
<div class="border mt-4"></div>