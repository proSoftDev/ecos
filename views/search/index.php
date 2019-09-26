<div class="border mt-4"></div>
<div class="container mb-4">
    <div class="row">
        <div class="col-sm-12 col-md">
            <nav class="menu" id="main-nav">
                <ul>
                    <? foreach (Yii::$app->view->params['headerMenu'] as $v):?>
                        <li><a href="<?=$v->url;?>"><?=$v->name;?></a></li>
                    <? endforeach;?>
                </ul>
            </nav>
        </div>
    </div>
</div>
<div class="container mt-5 mb-5">
    <div class="row">
        <div class="col-sm-12 col-md">
            <p class="main-plink"><a href="/"><?=Yii::$app->view->params['main']->name;?> </a><span>/ </span>Поиск</p>
        </div>
    </div>
</div>
<div class="services-content">
    <div class="container">
        <div class="row mt-5 mb-4">
            <div class="col-sm-12 col-md">
<!--                <h2 class="services-h2">Поиск</h2>-->
                <?if($count){?>
                    <p class="invest-body-text" style=";margin-bottom: 20px;">Результаты поиска по запросу <span style="font-weight: bold;"><?=$search?></span>.</p>
                <?}else{?>
                    <p class="invest-body-text" style="font-size: 22px;margin-bottom: 20px;">По запросу <span style="font-weight: bold;"><?=$search?></span> ничего не найдено.</p>
                <?}?>
            </div>
        </div>
    </div>



    <? $check = 0;?>

    <!--About-->
    <? if($about != null):?>
    <div class="container">
        <div class="row mt-5 mb-4">
            <div class="col-sm-12 col-md">
                <h2 class="services-h2"><?=$menu[1]->name;?></h2>
            </div>
        </div>
    </div>
    <? $m = 0;?>
    <? foreach ($about as $v):?>
        <? $m++;?>
        <div class="container">
            <div class="row">
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
                                    <?=\app\controllers\ContentController::cutStr($v->getContent(),400);?>
                                </p>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-sm-12 col-md">
                                <a href="<?=$menu[1]->url;?>" class="more">ПОДРОБНЕЕ</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <? if(count($about) > $m):?>
            <br><br>
        <? endif;?>
    <? endforeach;?>

    <? if($fao != null ||  $news != null || $partner != null || $service != null):?>
        <div class="border mt-5 mb-5"></div>
    <? endif;?>

    <? endif;?>
    <!--End About-->





    <!--FAQ-->
    <? if($fao != null):?>

    <div class="container">
        <div class="row mt-5 mb-4">
            <div class="col-sm-12 col-md">
                <h2 class="services-h2"><?=$menu[5]->name;?></h2>
            </div>
        </div>
    </div>

    <? $m = 0;?>
    <? foreach ($fao as $v):?>
    <? $m++;?>
    <div class="container">
        <div class="row">
            <div class="col-sm-12 col-md-8">
                <div class="container">
                    <div class="row">
                        <div class="col-sm-12 col-md">
                            <h3><?=$v->getQuestion();?></h3>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-sm-12 col-md">
                            <p>
                                <?=\app\controllers\ContentController::cutStr($v->getAnswer(),300);?>
                            </p>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-sm-12 col-md">
                            <a href="<?=$menu[5]->url;?>" class="more">ПОДРОБНЕЕ</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <? if(count($fao) > $m):?>
    <br><br>
    <? endif;?>
    <? endforeach;?>

    <? if($news != null || $partner != null || $service != null):?>
        <div class="border mt-5 mb-5"></div>
    <? endif;?>

    <? endif;?>
    <!--End FAQ-->






    <!--News-->
    <? if($news != null):?>
    <div class="container">
        <div class="row mt-5 mb-4">
            <div class="col-sm-12 col-md">
                <h2 class="services-h2"><?=$menu[7]->name;?></h2>
            </div>
        </div>
    </div>
    <? $m = 0;?>
    <? foreach ($news as $v):?>
    <? $m++;?>
    <div class="container">
        <div class="row">
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
                                <?=\app\controllers\ContentController::cutStr($v->getContent(),400);?>
                            </p>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-sm-12 col-md">
                            <a href="/news?id<?=$v->id?>" class="more">ПОДРОБНЕЕ</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <? if(count($news) > $m):?>
    <br><br>
    <? endif;?>
    <? endforeach;?>

    <? if($partner != null || $service != null):?>
        <div class="border mt-5 mb-5"></div>
    <? endif;?>

    <? endif;?>
    <!--End News-->


    <!--Partner-->
    <? if($partner != null):?>
    <div class="container">
        <div class="row mt-5 mb-4">
            <div class="col-sm-12 col-md">
                <h2 class="services-h2"><?=$menu[4]->name;?></h2>
            </div>
        </div>
    </div>

    <? $m = 0;?>
    <? foreach ($partner as $v):?>
    <? $m++;?>
    <div class="container">
        <div class="row">
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
                                <?=\app\controllers\ContentController::cutStr($v->getContent(),400);?>
                            </p>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-sm-12 col-md">
                            <a href="/partner?id=<?=$v->id;?>" class="more">ПОДРОБНЕЕ</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <? if(count($partner) > $m):?>
    <br><br>
    <? endif;?>
    <? endforeach;?>

    <? if($service != null):?>
        <div class="border mt-5 mb-5"></div>
    <? endif;?>

    <? endif;?>
    <!--End Partner-->







    <!--Services-->
    <? if($service != null):?>
    <div class="container">
        <div class="row mt-5 mb-4">
            <div class="col-sm-12 col-md">
                <h2 class="services-h2"><?=$menu[2]->name;?></h2>
            </div>
        </div>
    </div>

    <? $m = 0;?>
    <? foreach ($service as $v):?>
    <? $m++;?>
    <div class="container">
        <div class="row">
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
                                <?=\app\controllers\ContentController::cutStr($v->getContent(),400);?>
                            </p>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-sm-12 col-md">
                            <a href="/service?id=<?=$v->id;?>" class="more">ПОДРОБНЕЕ</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <? if(count($service) > $m):?>
    <br><br>
    <? endif;?>
    <? endforeach;?>
    <? endif;?>
    <!--End Services-->


    <div class="border mt-4"></div>

</div> 