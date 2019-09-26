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
        $this->setMeta($news->getName(), null, null);
        Yii::$app->view->params['page'] = 'news';

        return $this->render('newsin',compact('news'));
    }

    public function actionAll(){

        $model = Menu::find()->where('url = "/news/all"')->one();
        $this->setMeta($model->metaN, $model->metaK, $model->metaD);
        Yii::$app->view->params['page'] = 'news';

        $news = News::find()->orderBy('id DESC')->all();

        return $this->render('index',compact('model','news'));
    }

}