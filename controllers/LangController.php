<?php
/**
 * Created by PhpStorm.
 * User: admin
 * Date: 14.02.2019
 * Time: 11:00
 */

namespace app\controllers;
use Yii;
use yii\web\Controller;
use yii\web\ForbiddenHttpException;

class LangController extends Controller
{
    public function actionIndex($url){

        //Yii::$app->language = $url;

        if($url=='ru'){
            Yii::$app->session->set('lang','');
        }
        else if($url=='kz'){
            Yii::$app->session->set('lang','_kz');
        }
        else if($url=='en'){
            Yii::$app->session->set('lang','_en');
        }
        else{
            throw new ForbiddenHttpException;
        }
        $this->redirect($_SERVER['HTTP_REFERER']);
    }
}