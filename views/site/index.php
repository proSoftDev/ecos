<div class="border mt-4"></div>
<div class="container">
    <div class="row">
        <div class="col-sm-12 col-md">
            <nav class="menu" id="main-nav">
                <ul>
                    <? foreach (Yii::$app->view->params['headerMenu'] as $v):?>
                        <li class="<?=$v->url == "/"?"acting":"";?>"><a href="<?=$v->url;?>"><?=$v->getName();?></a></li>
                    <? endforeach;?>
                </ul>
            </nav>
        </div>
    </div>
</div>
<div class="container-fluid">
    <div id="carouselExampleControls" class="carousel slide" data-ride="carousel" data-interval="4000">
        <div class="carousel-inner">
            <? $class = 'active';?>
            <? foreach ($banner as $v):?>
                <div class="carousel-item <?=$class;?> bg-01" style="background-image:  url(<?=$v->getImage();?>);">
                    <div class="d-block">
                        <div class="slide-01 ml-4">
                            <h1>
                                <?=$v->title;?> <span class="mt-5"><?=$v->subTitle;?></span>
                            </h1>
                        </div>
                    </div>
                </div>
                <? $class = "";?>
            <? endforeach;?>
        </div>
        <a class="carousel-control-prev" href="#carouselExampleControls" role="button" data-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="sr-only">Previous</span>
        </a>
        <a class="carousel-control-next" href="#carouselExampleControls" role="button" data-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="sr-only">Next</span>
        </a>
    </div>
</div>
<div class="container service">
    <div class="row">
        <div class="col-12">
            <h2 class="ts mt-3"><?=Yii::$app->view->params['translation'][22]->text;?></h2>
        </div>
    </div>
    <? $m = 0;?>
    <? foreach ($services as $v):?>
        <? $m++;?>
        <? if($m % 4 == 1):?>
        <div class="row">
        <? endif;?>
            <? $col = 'name'.Yii::$app->session["lang"];?>
            <div class="col-sm-12 col-md-3">
                <a href="/service?id=<?=$v->id;?>"><span><img class="img-effect <?=$v->class;?>"><p><?=$v->$col;?></p></span></a>
            </div>
        <? if($m % 4 == 0):?>
        </div>
        <? endif;?>
    <? endforeach;?>
    <? if($m % 4 != 0):?>
    </div>
    <? endif;?>
</div>
<div class="border mt-4"></div>
