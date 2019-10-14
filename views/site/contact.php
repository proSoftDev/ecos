<script>
    function showPage(shown, hidden1, hidden2, hidden3, hidden4) {
        document.getElementById(shown).style.display='block';
        document.getElementById(hidden1).style.display='none';
        document.getElementById(hidden2).style.display='none';
        document.getElementById(hidden3).style.display='none';
        document.getElementById(hidden4).style.display='none';
        return false;
    }
</script>
<div class="border mt-4"></div>
<div class="container mb-4">
    <div class="row">
        <div class="col-sm-12 col-md">
            <nav class="menu" id="main-nav">
                <ul>
                    <? foreach (Yii::$app->view->params['headerMenu'] as $v):?>
                        <li class="<?=$v->url == "/site/contact"?"acting":"";?>"><a href="<?=$v->url;?>"><?=$v->name;?></a></li>
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
<div class="container">
    <div class="row mt-5 mb-4">
        <div class="col-sm-12 col-md">
            <h2 class="contact-h2"><?=$model->name;?></h2>
        </div>
    </div>
</div>
<div class="container">
    <div class="row">
        <div class="col-sm-12 col-md-2 jc-c">
            <a href="#" onclick="return showPage('sw-page_01','sw-page_02','sw-page_03','sw-page_04', 'sw-page_05');" class="inner-btn"><?=$contact[0]->getName();?></a>
        </div>
        <div class="col-sm-12 col-md-2 jc-c">
            <a href="#" onclick="return showPage('sw-page_02','sw-page_01','sw-page_03','sw-page_04', 'sw-page_05');" class="inner-btn"><?=$contact[1]->getName();?></a>
        </div>
        <div class="col-sm-12 col-md-3 jc-c">
            <a href="#" onclick="return showPage('sw-page_03','sw-page_01','sw-page_02','sw-page_04', 'sw-page_05');" class="inner-btn"><?=$contact[2]->getName();?></a>
        </div>
        <div class="col-sm-12 col-md-2 jc-c">
            <a href="#" onclick="return showPage('sw-page_04','sw-page_01','sw-page_02','sw-page_03', 'sw-page_05');" class="inner-btn"><?=$contact[3]->getName();?></a>
        </div>
        <div class="col-sm-12 col-md-3 jc-c">
            <a href="#" onclick="return showPage('sw-page_05','sw-page_01','sw-page_02','sw-page_03','sw-page_04');" class="inner-btn"><?=$contact[4]->getName();?></a>
        </div>
    </div>
</div>


<div id="sw-page_01" class="container contact-info">
    <? foreach ($contact[0]->types as $v):?>
        <div class="row mt-5">
            <div class="col-sm-12 col-md-4">
                <?=$v->getContent();?>
            </div>
            <div class="col-sm-12 col-md-8">
                <iframe src="<?=$v->url;?>"  frameborder="0" style="border:0;" allowfullscreen=""></iframe>
            </div>
        </div>
    <? endforeach;?>
</div>
<div id="sw-page_02" style="display: none;" class="container contact-info">
    <? foreach ($contact[1]->types as $v):?>
        <div class="row mt-5">
            <div class="col-sm-12 col-md-4">
                <?=$v->getContent();?>
            </div>
            <div class="col-sm-12 col-md-8">
                <iframe src="<?=$v->url;?>"  frameborder="0" style="border:0;" allowfullscreen=""></iframe>
            </div>
        </div>
    <? endforeach;?>
</div>
<div id="sw-page_03" style="display: none;" class="container contact-info">
    <? foreach ($contact[2]->types as $v):?>
        <div class="row mt-5">
            <div class="col-sm-12 col-md-4">
                <?=$v->getContent();?>
            </div>
            <div class="col-sm-12 col-md-8">
                <iframe src="<?=$v->url;?>"  frameborder="0" style="border:0;" allowfullscreen=""></iframe>
            </div>
        </div>
    <? endforeach;?>
</div>
<div id="sw-page_04" style="display: none;" class="container contact-info">
    <? foreach ($contact[3]->types as $v):?>
        <div class="row mt-5">
            <div class="col-sm-12 col-md-4">
                <?=$v->getContent();?>
            </div>
            <div class="col-sm-12 col-md-8">
                <iframe src="<?=$v->url;?>"  frameborder="0" style="border:0;" allowfullscreen=""></iframe>
            </div>
        </div>
    <? endforeach;?>
</div>
<div id="sw-page_05" style="display: none;" class="container contact-info">
    <? foreach ($contact[4]->types as $v):?>
        <div class="row mt-5">
            <div class="col-sm-12 col-md-4">
                <?=$v->getContent();?>
            </div>
            <div class="col-sm-12 col-md-8">
                <iframe src="<?=$v->url;?>"  frameborder="0" style="border:0;" allowfullscreen=""></iframe>
            </div>
        </div>
    <? endforeach;?>
</div>

<?=$this->render('/partials/partner.php')?>

<div class="border mt-4"></div>