<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Faq */

$this->title = 'Редактирование : ' . $model->question;
$this->params['breadcrumbs'][] = ['label' => 'Вопрос-ответ', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->question, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Редактирование';
?>
<div class="faq-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
