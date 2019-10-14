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
            <p class="main-plink"><a href="/"><?=Yii::$app->view->params['main']->name;?> </a>
                <span>/ </span><a href="/service/all"><?=$model->name;?></a>
                <span>/ </span><?=$service->getName();?>
            </p>
        </div>
    </div>
</div>
<div class="services-content">
    <div class="container">
        <div class="row mt-5 mb-4">
            <div class="col-sm-12 col-md">
                <h2 class="services-h2"><?=$service->getName();?></h2>
            </div>
        </div>
    </div>
    <div class="container">
        <div class="row">
            <div class="col-sm-12 col-md-4 text-center">
                <img src="<?=$service->getImage();?>" class="mb-3">
            </div>
            <div class="col-sm-12 col-md-8">
                <div class="container">
                    <div class="row">
                        <div class="col-sm-12 col-md">

                        </div>
                    </div>
                    <div class="row">
                        <div class="col-sm-12 col-md">
                           <p>
                               <?=$service->getContent();?>
                           </p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <?=$this->render('/partials/partner.php')?>
    <div class="border mt-4"></div>
</div>