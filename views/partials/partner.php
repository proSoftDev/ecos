<div class="container">
    <div class="row mt-5 mb-4">
        <div class="col-sm-12 col-md">
            <h2 class="about-h2"><?=Yii::$app->view->params['translation'][31]->text;?></h2>
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
                                <p><?=$v->getName();?></p>
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