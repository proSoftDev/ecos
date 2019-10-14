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
        $this->setMeta($service->getName());
        $this->setClass('services');

        return $this->render('inner',compact('service'));
    }


    public function actionAll()
    {
        $model = Menu::getModel("/service/all");
        $service = Service::find()->all();

        $this->setMeta($model->metaN, $model->metaK, $model->metaD);
        $this->setClass('services');

        return $this->render('index',compact('model','service'));
    }







}