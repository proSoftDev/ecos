<div class="container">
    <div class="row">
        <div class="col-sm-12 col-md-3 footer-nav">
            <div class="logo">
                <img src="/public/images/logo2.png" alt="logo">
            </div>
            <p class="mt-4"><span><?=Yii::$app->view->params['translation'][32]->text;?></span></p><p class="break"><?=Yii::$app->view->params['translation'][33]->text;?><p class="break"><span class="grey"><?=Yii::$app->view->params['translation'][34]->text;?></span></p></p>
        </div>
        <div class="col-sm-12 col-md-3 footer-nav">
            <? foreach (Yii::$app->view->params['footerMenu'] as $v):?>
                <a href="<?=$v->url;?>"><?=$v->name;?></a>
            <? endforeach;?>
        </div>
        <div class="col-sm-12 col-md-3 footer-nav">
            <h4><?=Yii::$app->view->params['contact']->getAddress();?></h4>
            <p><?=Yii::$app->view->params['translation'][35]->text;?>: <a href="tel:<?=Yii::$app->view->params['contact']->tel;?>"><?=Yii::$app->view->params['contact']->tel;?></a></p>
            <p><?=Yii::$app->view->params['translation'][36]->text;?>: <a href="tel: <?=Yii::$app->view->params['contact']->fax;?>"><?=Yii::$app->view->params['contact']->fax;?></a></p>
            <p><?=Yii::$app->view->params['translation'][37]->text;?>: <a href="mailto:<?=Yii::$app->view->params['contact']->email;?>"><?=Yii::$app->view->params['contact']->email;?></a></p>
        </div>
        <div class="col-sm-12 col-md-3 footer-nav">
            <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d726.8468693337454!2d76.90169707204218!3d43.222335097829514!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x388369fba985ead5%3A0x1bfda4abf61624d8!2z0YPQu9C40YbQsCDQltCw0YDQvtC60L7QstCwIDIxMEEsINCQ0LvQvNCw0YLRiyAwNTAwMDA!5e0!3m2!1sru!2skz!4v1568462790820!5m2!1sru!2skz" frameborder="0" style="border:0;" allowfullscreen=""></iframe>
        </div>
    </div>
</div>


<script type="text/javascript">
    function changeImg() {
        let langValue = document.getElementById("lang").value;
        document.getElementById("selectedLang").src = "/public/images/" + langValue + ".png";
    };
</script>
