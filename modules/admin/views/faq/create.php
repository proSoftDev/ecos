<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Faq */

$this->title = 'Создание';
$this->params['breadcrumbs'][] = ['label' => 'Вопрос-ответ', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="faq-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
