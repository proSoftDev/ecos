<?php
/**
 * Created by PhpStorm.
 * User: admin
 * Date: 11.03.2019
 * Time: 15:32
 */

namespace app\modules\admin\controllers;


use app\models\Feedback;
use Yii;
use yii\web\Controller;

class BackendController extends Controller
{

    public function init()
    {


        $feedback = Feedback::findAll(['isRead'=>0]);
        Yii::$app->view->params['feedback'] = $feedback;
        parent::init(); // TODO: Change the autogenerated stub
    }

    public function beforeAction($action){
        if(\Yii::$app->user->identity->role != 1 && $action->actionMethod != 'actionLogin'){
            \Yii::$app->user->logout();
            return $this->redirect('/auth/login');
        }

        return parent::beforeAction($action);

    }

}