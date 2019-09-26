<div class="border mt-4"></div>
<div class="container">
    <div class="row">
        <div class="col-sm-12 col-md">
            <nav class="menu" id="main-nav">
                <ul>
                    <? foreach (Yii::$app->view->params['headerMenu'] as $v):?>
                        <li class="<?=$v->url == "/site/faq"?"acting":"";?>"><a href="<?=$v->url;?>"><?=$v->name;?></a></li>
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
<div class="question-content">
    <div class="container">
        <div class="row mt-5 mb-4">
            <div class="col-sm-12 col-md">
                <h1 class="question-h1"><?=$model->name;?></h1>
            </div>
        </div>
    </div>

    <div class="container question-dashed-border pl-5">
        <? foreach ($faq as $v):?>
            <div class="row">
                <div class="col-sm-12 col-md-12">
                    <div class="dropdown">
                        <input type="checkbox">
                        <a href="#">
                            <?=$v->getQuestion();?>
                        </a>
                        <div class="dropdown-content">
                            <?=$v->getAnswer();?>
                        </div>
                    </div>
                </div>
            </div>
        <? endforeach;?>

    </div>

    <div class="border mt-4"></div>