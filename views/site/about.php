<script>
    function showPage(shown, hidden1, hidden2,hidden3) {
        document.getElementById(shown).style.display='block';
        document.getElementById(hidden1).style.display='none';
        document.getElementById(hidden2).style.display='none';
        document.getElementById(hidden3).style.display='none';
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
                        <li class="<?=$v->url == "/site/about"?"acting":"";?>"><a href="<?=$v->url;?>"><?=$v->name;?></a></li>
                    <? endforeach;?>
                </ul>
            </nav>
        </div>
    </div>
</div>
<div class="block img"></div>
<div class="container mt-5 mb-5">
    <div class="row">
        <div class="col-sm-12 col-md">
            <p class="main-plink"><a href="/"><?=Yii::$app->view->params['main']->name;?> </a><span>/ </span><?=$model->name;?></p>
        </div>
    </div>
</div>
<div class="about-content">
    <div class="container">
        <div class="row mb-4">
            <div class="col-sm-12 col-md">
                <h1 class="about-h1"><?=$model->name;?></h1>
            </div>
        </div>
        <div class="row">
            <div class="col-sm-12 col-md">
                <nav class="sw-pages-menu">
                    <ul>
                        <li class="acting-sw-link"><a href="#" onclick="return showPage('sw-page_01','sw-page_02','sw-page_03','sw-page_04');"><?=$about[0]->getName();?></a></li>
                        <li><a href="#" onclick="return showPage('sw-page_02','sw-page_01','sw-page_03','sw-page_04');"><?=$about[1]->getName();?></a></li>
                        <li><a href="#" onclick="return showPage('sw-page_03','sw-page_01','sw-page_02','sw-page_04');"><?=$about[2]->getName();?></a></li>
                        <li><a href="#" onclick="return showPage('sw-page_04','sw-page_01','sw-page_02','sw-page_03');"><?=$about[3]->getName();?></a></li>
                    </ul>
                </nav>
            </div>
        </div>
    </div>
    <div class="container mt-5">
        <div class="row">
            <div id="sw-page_01" class="col-sm-12 col-md">
                <?=$about[0]->getContent();?>
            </div>
        </div>
    </div>
    <div class="container">
        <div class="row">
            <div id="sw-page_02" class="col-sm-12 col-md" >
                <?=$about[1]->getContent();?>
            </div>
        </div>
    </div>
    <div class="container">
        <div class="row">
            <div id="sw-page_03" class="col-sm-12 col-md">
                <?=$about[2]->getContent();?>
            </div>
        </div>
    </div>
    <div class="container">
        <div class="row">
            <div id="sw-page_04" class="col-sm-12 col-md">
                <?=$about[3]->getContent();?>
            </div>
        </div>
    </div>
</div>

<?=$this->render('/partials/partner.php')?>

<div class="border mt-4"></div>