<?php
/**
 * Created by PhpStorm.
 * User: admin
 * Date: 24.09.2019
 * Time: 16:21
 */

namespace app\controllers;


use app\models\Menu;
use app\models\News;
use Yii;

class NewsController extends FrontendController
{


    public function actionIndex($id)
    {
        $news = News::findOne($id);

        $this->setMeta($news->getName());
        $this->setClass('news');

        return $this->render('inner',compact('news'));
    }

    public function actionAll(){

        $model = Menu::getModel("/news/all");
        $news = News::getAll();

        $this->setMeta($model->metaN, $model->metaK, $model->metaD);
        $this->setClass('news');

        return $this->render('index',compact('model','news'));
    }

}