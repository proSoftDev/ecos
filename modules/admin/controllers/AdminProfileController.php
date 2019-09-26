<?php
/**
 * Created by PhpStorm.
 * User: admin
 * Date: 01.08.2019
 * Time: 15:52
 */

namespace app\modules\admin\controllers;
use app\models\User;
use Yii;
use yii\web\Controller;

class AdminProfileController extends BackendController
{
    public function actionIndex(){
        $admin = User::find()->where('role=1')->one();
        return $this->render('index',compact('admin'));
    }

    public function actionSetProfile($username, $password){
        $admin = User::find()->where('role=1')->one();
        $admin->username = $username;
        $admin->setPassword($password);
        if($admin->save(false)){
            Yii::$app->session->setFlash('profile_success','Профиль успешно обновлен!');
            return $this->redirect('/admin/');
        }else{
            Yii::$app->session->setFlash('profile_error','Что-то пошло не так!');
            return $this->redirect('/admin/');
        }
    }

}