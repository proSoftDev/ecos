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
                <a href="/service-inner?id=<?=$v->id;?>"><span><img class="img-effect <?=$v->class;?>"><p><?=$v->$col;?></p></span></a>
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
<div class="container nav">
    <div class="row">
        <div class="col-12">
            <h2>Проектирование и строительство</h2>
        </div>
    </div>
    <div class="row">
        <div class="col-sm-12 col-md-4 info-nav">
            <div class="dropdown">
                <input type="checkbox">
                <a href="#">Проектирование системы автоматического водяного и пенного пожаротушения</a>
                <p class="dropdown-content">Проектирование системы автоматического водяного и пенного пожаротушения</p>
            </div>
            <div class="dropdown">
                <input type="checkbox">
                <a href="#">Проектирование системы порошкового и газового пожаротушения;</a>
                <p class="dropdown-content">Проектирование системы порошкового и газового пожаротушения;</p>
            </div>
            <div class="dropdown">
                <input type="checkbox">
                <a href="#">Проектирование системы пожарной, газовой и охранной  сигнализации;</a>
                <p class="dropdown-content">Проектирование системы пожарной, газовой и охранной  сигнализации;</p>
            </div>
            <div class="dropdown">
                <input type="checkbox">
                <a href="#">Проектирование системы пожарной, газовой и охранной  сигнализации;</a>
                <p class="dropdown-content">Проектирование системы пожарной, газовой и охранной  сигнализации;</p>
            </div>
        </div>
        <div class="col-sm-12 col-md-4 info-nav">
            <div class="dropdown">
                <input type="checkbox">
                <a href="#">Речевое оповещение, громкоговорящая и диспетчерская связь;</a>
                <p class="dropdown-content">Речевое оповещение, громкоговорящая и диспетчерская связь;
                </p>
            </div>
            <div class="dropdown">
                <input type="checkbox">
                <a href="#">Работы в области автоматизации технологических процессов;</a>
                <p class="dropdown-content">Работы в области автоматизации технологических процессов;</p>
            </div>
            <div class="dropdown">
                <input type="checkbox">
                <a href="#">Работы в области автоматизации технологических процессов;</a>
                <p class="dropdown-content">Работы в области автоматизации технологических процессов;</p>
            </div>
            <div class="dropdown">
                <input type="checkbox">
                <a href="#">Работы в области автоматизации технологических процессов;</a>
                <p class="dropdown-content">Работы в области автоматизации технологических процессов;</p>
            </div>
            <div class="dropdown">
                <input type="checkbox">
                <a href="#">Системы связи и инженерные системы;</a>
                <p class="dropdown-content">Системы связи и инженерные системы;</p>
            </div>
        </div>
        <div class="col-sm-12 col-md-4 info-nav">
            <div class="dropdown">
                <input type="checkbox">
                <a href="#">Создание концепции противопожарной и противоаварийной систем (АСУТП).</a>
                <p class="dropdown-content">Создание концепции противопожарной и противоаварийной систем (АСУТП).</p>
            </div>
            <div class="dropdown">
                <input type="checkbox">
                <a href="#">Инженерные изыскания;</a>
                <p class="dropdown-content">Инженерные изыскания;</p>
            </div>
            <div class="dropdown">
                <input type="checkbox">
                <a href="#">Строительные работы;</a>
                <p class="dropdown-content">Строительные работы;</p>
            </div>
            <div class="dropdown">
                <input type="checkbox">
                <a href="#">Реконструкция существующих зданий;</a>
                <p class="dropdown-content">Реконструкция существующих зданий;</p>
            </div>
            <div class="dropdown">
                <input type="checkbox">
                <a href="#">Внутренние отделочные работы;</a>
                <p class="dropdown-content">Внутренние отделочные работы;</p>
            </div>
            <div class="dropdown">
                <input type="checkbox">
                <a href="#">Монтаж инженерных сетей.;</a>
                <p class="dropdown-content">Монтаж инженерных сетей.</p>
            </div>
        </div>
    </div>
</div>
</div>
<div class="border mt-4"></div>