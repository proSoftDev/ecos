<?php
/**
 * Created by PhpStorm.
 * User: admin
 * Date: 24.09.2019
 * Time: 16:24
 */

namespace app\controllers;


use app\models\Catalog;
use app\models\Menu;
use Yii;

class PartnerController extends FrontendController
{

    public function actionIndex($id)
    {

        $partner = Catalog::findOne($id);
        $this->setMeta($partner->getName());
        $this->setClass('partners');

        return $this->render('inner',compact('partner'));
    }


    public function actionAll(){

        $model = Menu::getModel("/partner/all");
        $partners = Catalog::getAllCatalog();

        $this->setMeta($model->metaN, $model->metaK, $model->metaD);
        $this->setClass('partners');

        return $this->render('index',compact('model','partners'));
    }

}