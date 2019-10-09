<div class="border mt-4"></div>
<div class="container mb-4">
    <div class="row">
        <div class="col-sm-12 col-md">
            <nav class="menu" id="main-nav">
                <ul>
                    <? foreach (Yii::$app->view->params['headerMenu'] as $v):?>
                        <li class="<?=$v->url == "/product/partners"?"acting":"";?>"><a href="<?=$v->url;?>"><?=$v->name;?></a></li>
                    <? endforeach;?>
                </ul>
            </nav>
        </div>
    </div>
</div>
<div class="container mt-5 mb-5">
    <div class="row">
        <div class="col-sm-12 col-md">
            <p class="main-plink"><a href="/"><?=Yii::$app->view->params['main']->name;?> </a><span>/ </span><?=Yii::$app->view->params['translation'][38]->text;?></p>
        </div>
    </div>
</div>
<div class="container">
    <div class="row mt-5 mb-4">
        <div class="col-sm-12 col-md">
            <h1 class="production-h1"><?=Yii::$app->view->params['translation'][38]->text;?></h1>
        </div>
    </div>
</div>

<div class="container-fluid">
    <div id="carouselExampleControls" class="carousel slide" data-ride="carousel" data-interval="4000">
        <div class="carousel-inner">
            <? $status = 'active';$m=0;?>
            <? foreach (Yii::$app->view->params['partner'] as $v):?>
                <? $m++;?>
                <? if($m % 6 == 1):?>
                    <div class="carousel-item <?=$status;?>">
                    <div class="container">
                    <div class="row">
                <? endif;?>
                <div class="col-sm-12 col-md-4 separator">
                    <img src="<?=$v->getImage();?>">
                    <h2><?=$v->getName();?></h2>
                    <a class="moreOfProductions" href="/product/all?id=<?=$v->id;?>"><?=Yii::$app->view->params['translation'][39]->text;?></a>
                </div>
                <? if($m % 6 == 0):?>
                    </div>
                    </div>
                    </div>
                <? endif;?>
                <? $status = '';?>
            <? endforeach;?>

            <? if($m % 6 != 0):?>
        </div>
    </div>
</div>
<? endif;?>

</div>
<div class="container">
    <div class="row">
        <div class="col-6 left-arrow">
            <div class="left-bg">
                <a class="" href="#carouselExampleControls" role="button" data-slide="prev">
                    <span class="" aria-hidden="true"></span>
                    <span class="sr-only">Previous</span>
                </a>
            </div>
        </div>
        <div class="col-6 right-arrow">
            <div class="right-bg">
                <a class="" href="#carouselExampleControls" role="button" data-slide="next">
                    <span class="" aria-hidden="true"></span>
                    <span class="sr-only">Next</span>
                </a>
            </div>
        </div>
    </div>
</div>
</div>
</div>

<div class="border mt-4"></div>