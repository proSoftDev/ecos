<?php
/**
 * Created by PhpStorm.
 * User: admin
 * Date: 24.09.2019
 * Time: 16:24
 */

namespace app\controllers;


use app\models\Menu;
use app\models\Service;
use Yii;

class ServiceController extends FrontendController
{

    public function actionIndex($id)
    {
        $service = Service::findOne($id);
        $this->setMeta($service->getName(), null, null);
        Yii::$app->view->params['page'] = 'service';

        return $this->render('servicein',compact('service'));
    }


    public function actionAll(){

        $model = Menu::find()->where('url = "/service/all"')->one();
        $this->setMeta($model->metaN, $model->metaK, $model->metaD);
        Yii::$app->view->params['page'] = 'services';

        $service = Service::find()->all();

        return $this->render('index',compact('model','service'));
    }







}