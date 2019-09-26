<div class="border mt-4"></div>
<div class="container mb-4">
    <div class="row">
        <div class="col-sm-12 col-md">
            <nav class="menu" id="main-nav">
                <ul>
                    <? foreach (Yii::$app->view->params['headerMenu'] as $v):?>
                        <li class="<?=$v->url == "/product/all"?"acting":"";?>"><a href="<?=$v->url;?>"><?=$v->name;?></a></li>
                    <? endforeach;?>
                </ul>
            </nav>
        </div>
    </div>
</div>
<div class="container mt-5 mb-5">
    <div class="row">
        <div class="col-sm-12 col-md">
            <p class="main-plink"><a href="/"><?=Yii::$app->view->params['main']->name;?> </a><span>/ </span><a href="<?=$model->url;?>"><?=$model->name;?> </a><span>/ </span><?=$product->getName();?></p>
        </div>
    </div>
</div>
<div class="cards-content">
    <div class="container">
        <div class="row">
            <div class="col-sm-12 col-md-4">
                <div class="container">
                    <div class="row">
                        <div class="col-sm-12 col-md cs300-lg">
                            <img src="<?=$images[0]->getImage();?>" id="expandedImg">
                            <span class="zoom">
									<p data-zoom="1"><?=Yii::$app->view->params['translation'][28]->text;?></p>
								</span>
                        </div>
                    </div>
                    <div class="row mt-3">
                        <div class="col-sm-12 col-md pl-0 pr-0">
                            <div class="container pl-0 pr-0 mb-5">
                                <div class="row">
                                    <div class="col-sm-12 col-md mini-imgs">
                                        <div class="container">
                                            <div class="row">
                                                <? foreach ($images as $v):?>
                                                <div class="col-4">
                                                    <img src="<?=$v->getImage();?>">
                                                </div>
                                                <? endforeach;?>
                                            </div>
                                        </div>

                                    </div>
                                </div>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
            <div class="col-sm-12 col-md-8">
                <h2><?=$product->getName()?></h2>
                <p class="p"><?=$product->getCatalogName();?></p>
                <?=$product->getContentA();?>

                <h4 class="mb-5 mt-5"><?=Yii::$app->view->params['translation'][29]->text;?></h4>
                <?=$product->getContentB();?>
                <div class="container mb-5">
                    <div class="row production-border">
                        <div class="col-sm-12 col-md">
                            <p><span><?=Yii::$app->view->params['translation'][30]->text;?>:</span> <?=$product->getKeyword();?></p>
                        </div>
                    </div>
                    <div class="row mt-5">
                        <? foreach ($documents as $v):?>
                            <div class="col-sm-12 col-md-3">
                                <a href="<?=$v->getFile(Yii::$app->session['lang']);?>" class="inner-btn" target="_blank"><?=$v->getName();?></a>
                            </div>
                        <? endforeach;?>
                    </div>
                </div>

            </div>
        </div>
    </div>

    <?=$this->render('/partials/partner.php')?>
    <div class="border mt-5"></div>
</div>