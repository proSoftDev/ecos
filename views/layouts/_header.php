<div class="container">
    <div class="row pt-3 text-center">
        <div class="col-sm-12 col-md">
            <a href="/"><img  class="logo" src="/public/images/logo.png" alt="logo"></a>
        </div>
        <div class="col-sm-12 col-md slct">
            <select name="lang" class="lang" onchange="location = this.options[this.selectedIndex].value;">
                <option value="/lang/?url=ru"  <?=(Yii::$app->session["lang"]=="")?'selected':''?>>Русский</option>
                <option value="/lang/?url=en" <?=(Yii::$app->session["lang"]=="_en")?'selected':''?>>Английский</option>
                <option value="/lang/?url=kz" <?=(Yii::$app->session["lang"]=="_kz")?'selected':''?>>Казахский</option>
            </select>
        </div>
        <form class="col-sm-12 col-md" action="/search/">
            <input class="search" type="search" placeholder="Поиск" name="text">
        </form>
        <div class="col-sm-12 col-md phone">
            <a class="number" href="tel:<?=Yii::$app->view->params['contact']->tel;?>"><?=Yii::$app->view->params['contact']->tel;?></a>
        </div>
        <div class="col-sm-12 col-md">
            <button type="button" class="order-a-call" data-toggle="modal" data-target="#exampleModal">
               <?=Yii::$app->view->params['translation'][1]->text;?>
            </button>
            <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h4 class="modal-title" id="exampleModalLabel"><?=Yii::$app->view->params['translation'][1]->text;?></h4>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            <form>
                                <label for="uname" class="form-control-label"><?=Yii::$app->view->params['translation'][2]->text;?>:</label>
                                <input type="text" class="form-control feedbackName"  name="fio">
                                <label for="uname" class="form-control-label"><?=Yii::$app->view->params['translation'][3]->text;?>:</label>
                                <input type="text" class="form-control feedbackPhone" name="telephone">
                                <label for="uname" class="form-control-label"><?=Yii::$app->view->params['translation'][4]->text;?>:</label>
                                <input type="email" class="form-control feedbackEmail" name="email">
                                <label for="uname" class="form-control-label"><?=Yii::$app->view->params['translation'][5]->text;?>:</label>
                                <textarea type="text" class="form-control feedbackContent" name="content"></textarea>
                            </form>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal"><?=Yii::$app->view->params['translation'][21]->text;?></button>
                            <button type="button" class="btn btn-primary" id="sendFeedback"><?=Yii::$app->view->params['translation'][6]->text;?></button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
<script src="https://rawgit.com/RobinHerbots/jquery.inputmask/3.x/dist/jquery.inputmask.bundle.js"></script>

<script>
    $(".feedbackName").keyup(function (e) {
        var regex = /^[a-zA-Zа-яА-Яа-яА-Я ]+$/;
        if (regex.test(this.value) !== true)
            this.value = this.value.replace(/[^a-zA-Zа-яА-Яа-яА-Я ]+/, '');
    });
    $('.feedbackPhone').inputmask("8(999) 999-9999");
</script>


<?
$error = Yii::$app->view->params['translation'][7]->text;
$nameError = Yii::$app->view->params['translation'][8]->text;
$tel1Error = Yii::$app->view->params['translation'][20]->text;
$tel2Error = Yii::$app->view->params['translation'][9]->text;
$mailError = Yii::$app->view->params['translation'][10]->text;
$contentError = Yii::$app->view->params['translation'][11]->text;
$feedbackSuccess = Yii::$app->view->params['translation'][12]->text;
$feedbackText = Yii::$app->view->params['translation'][13]->text;
?>

<script>
    $("#sendFeedback").click(function () {
        var name = $(".feedbackName").val();
        var phone = $(".feedbackPhone").val();
        var email = $(".feedbackEmail").val();
        var content = $(".feedbackContent").val();

        phoneStatus = true;
        for (var j = 0; j < phone.length; j++) {
            if (phone.charAt(j) == '_') {
                phoneStatus = false;
            }
        }

        if(!name){
            swal('<?=$error?>!','<?=$nameError?>.','error');
        }else if(!phone) {
            swal('<?=$error?>!', '<?=$tel1Error?>.', 'error');
        }else if (!phoneStatus || phone == 0) {
            swal('<?=$error?>!','<?=$tel2Error?>.','error');
        }else if(!email) {
            swal('<?=$error?>!','<?=$mailError?>.','error');
        }else if(!content) {
            swal('<?=$error?>!','<?=$contentError?>.','error');
        }else{
            $.ajax({
                type: "GET",
                dataType: "json",
                url: "/site/request",
                data: {name:name,email:email,phone:phone,content:content},
                success: function(data){
                    if(data.status){
                        $(".feedbackName").val("");
                        $(".feedbackPhone").val("");
                        $(".feedbackEmail").val("");
                        $(".feedbackContent").val("");
                        swal('<?=$feedbackSuccess;?>!', '<?=$feedbackText;?>.', 'success');
                    }else{
                        $(".feedbackName").val("");
                        $(".feedbackPhone").val("");
                        $(".feedbackEmail").val("");
                        $(".feedbackContent").val("");
                        swal('Упс!', 'Что-то пошло не так.', 'error');


                    }
                },
                error: function () {
                    swal('Упс!', 'Что-то пошло не так.', 'error');
                }
            });

            $.ajax({
                type: "GET",
                dataType: "json",
                url: "/site/request-email",
                data: {name:name,email:email,phone:phone,content:content},
                success: function(data){

                },
                error: function () {

                }
            });
        }
    });
</script>
