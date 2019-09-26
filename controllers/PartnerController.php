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
use app\models\Partner;
use Yii;

class PartnerController extends FrontendController
{

    public function actionIndex($id)
    {
        $partner = Catalog::findOne($id);
        $this->setMeta($partner->getName(), null, null);
        Yii::$app->view->params['page'] = 'partner';

        return $this->render('partnerin',compact('partner'));
    }


    public function actionAll(){

        $model = Menu::find()->where('url = "/partner/all"')->one();
        $this->setMeta($model->metaN, $model->metaK, $model->metaD);
        Yii::$app->view->params['page'] = 'partners';
        $partners = Catalog::find()->where('level=1 && status=1')->orderBy('sort ASC')->all();

        return $this->render('index',compact('model','partners'));
    }

}