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
                        <img src="<?=$images[0]->getImage();?>">
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