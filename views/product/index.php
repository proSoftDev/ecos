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
    <div id="filter_result">
        <div class="container mt-5 mb-5">
            <div class="row">
                <div class="col-sm-12 col-md">
                    <p class="main-plink"><a href="/"><?=Yii::$app->view->params['main']->name;?> </a><span>/ </span><?=$model->name;?></p>
                </div>
            </div>
        </div>
        <div class="production-content">
            <div class="container">
                <div class="row mt-5 mb-4">
                    <div class="col-sm-12 col-md">
                        <h1 class="production-h1"><?=$model->name;?></h1>
                    </div>
                </div>
            </div>
            <div class="container">
                <div class="row">
                    <div class="col-sm-12 col-md-1 jc-c">
                        <a style="cursor: pointer" class="inner-btn all"><?=Yii::$app->view->params['translation'][24]->text;?></a>
                    </div>
                    <div class="col-sm-12 col-md-3 jc-c">
                        <div class="dropdown">
                            <button class="inner-btn first-btn" type="button" data-toggle="dropdown">
                                <? if(isset($_SESSION['partner_id'])):?><?=$current_partner->getName();?><?endif;?>
                                <? if(!isset($_SESSION['partner_id'])):?><?=Yii::$app->view->params['translation'][23]->text;?><?endif;?>
                            </button>
                            <ul class="dropdown-menu">
                                <? foreach ($manufacturer as $v):?>
                                    <li><a class="manufacturer" data-id="<?=$v->id;?>" style="cursor: pointer"><?=$v->getName();?></a></li>
                                <? endforeach;?>
                            </ul>
                        </div>
                    </div>
                    <div class="col-sm-12 col-md-2 jc-c">
                        <div class="dropdown">
                            <button class="inner-btn second-btn" type="button" data-toggle="dropdown"><?=Yii::$app->view->params['translation'][25]->text;?>
                            </button>
                            <ul class="dropdown-menu">
                                <? if($category != null):?>
                                    <? foreach ($category as $v):?>
                                        <li><a class="category" data-id="<?=$v->id;?>" style="cursor: pointer"><?=$v->getName();?></a></li>
                                    <? endforeach;?>
                                <? endif;?>
                            </ul>
                        </div>
                    </div>
                    <div class="col-sm-12 col-md-3 jc-c">
                        <div class="dropdown">
                            <button class="inner-btn third-btn" type="button" data-toggle="dropdown"><?=Yii::$app->view->params['translation'][26]->text;?>
                            </button>
                            <ul class="dropdown-menu">
                                <? if($subCategory != null):?>
                                    <? foreach ($subCategory as $v):?>
                                        <li><a class="sub-category" data-id="<?=$v->id;?>" style="cursor: pointer"><?=$v->getName();?></a></li>
                                    <? endforeach;?>
                                <? endif;?>
                            </ul>
                        </div>
                    </div>
                    <div class="col-sm-12 col-md-3 jc-c">
                        <input class="search" type="search" placeholder="<?=Yii::$app->view->params['translation'][0]->text;?>">
                    </div>
                </div>
            </div>
            <div class="container mt-5" id="searchResult">
                <? if($product != null):?>
                    <? $m = 0;$class = "";?>
                    <? foreach ($product as $v):?>
                        <? $images = $v->images;$m++;?>
                        <? if($m % 2 == 1):?>
                        <div class="row <?=$class;?>">
                        <? $class = "mt-3";?>
                        <? endif;?>
                            <div class="col-sm-12 col-md-6">
                                <div class="container production-border">
                                    <div class="row">
                                        <div class="col-sm-12 col-md-5">
                                            <img src="<?=$images != null?$images[0]->getImage():'/no-image.png';?>">
                                        </div>
                                        <div class="col-sm-12 col-md-7">
                                            <h4 class="h4">
                                                <?=$v->getName();?>
                                            </h4>
                                            <p class="p">
                                                <?=$v->getCatalogName();?>
                                            </p>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-sm-12 col-md mt-3 pr-5">
                                            <p>
                                                <?=\app\controllers\ContentController::cutStr($v->getContentA(),200);?>
                                            </p>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-sm-12 col-md">
                                            <a href="/product?id=<?=$v->id;?>" class="more"><?=Yii::$app->view->params['translation'][16]->text;?></a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        <? if($m % 2 == 0):?>
                        </div>
                        <? endif;?>
                    <? endforeach;?>
                    <? if($m % 2 != 0):?>
                    </div>
                    <? endif;?>
                <? endif;?>
                <? if($product == null):?>
                    <p><?=Yii::$app->view->params['translation'][27]->text;?></p>
                <? endif;?>
            </div>
    </div>

    <?=$this->render('/partials/partner.php')?>
    <div class="border mt-4"></div>
</div>