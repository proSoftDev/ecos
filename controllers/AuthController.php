<?php

namespace app\controllers;

use app\models\LoginForm;
use app\models\SignupForm;
use app\models\User;
use Yii;
use yii\web\Controller;
use yii\web\IdentityInterface;

class AuthController extends FrontendController
{
    public  $layout = "auth";
    public function actionLogin()
    {
        if (!Yii::$app->user->isGuest) {
            return $this->redirect("/admin/menu/index");
        }

        $model = new LoginForm();
        if ($model->load(Yii::$app->request->post()) && $model->login()) {
            return $this->redirect("/admin/menu/index");
        }
        return $this->render('login', [
            'model' => $model,
        ]);
    }

    /**
     * Logout action.
     *
     * @return string
     */
    public function actionLogout()
    {
        Yii::$app->user->logout();

        return $this->redirect('/auth/login');
    }




    public function actionUpdatePassword(){
        $admin = User::find()->where('role=1')->one();
        $code = $admin->randomPassword;
        if(isset($_SESSION['confirmCode'])){
            return $this->render('confirm-code');
        }else{
            $_SESSION['confirmCode'] = $code;
            if($this->sendNewPassword($admin->username,$code)){
                return $this->render('confirm-code');
            }
        }


    }

    public function actionConfirmCode($code){
        if($_SESSION['confirmCode'] == $code){
            return $this->render('update-password',compact('code'));
        }else{
            Yii::$app->session->setFlash('code_error','неверный код!');
            return $this->render('confirm-code');
        }
    }

    public function actionNewPassword($code, $password, $confirmPassword){
        if($_SESSION['confirmCode'] == $code) {
            if ($password == $confirmPassword) {
                $admin = User::find()->where('role=1')->one();
                $admin->setPassword($password);
                if ($admin->save(false)) {
                    unset($_SESSION['confirmCode']);
                    Yii::$app->session->setFlash('set_password_success', 'Пароль успешно обновлен!');
                    $model = new LoginForm();
                    return $this->render('login',compact('model'));
                } else {
                    Yii::$app->session->setFlash('set_password_error', 'Упс, что-то пошло не так!');
                    return $this->redirect('/auth/confirm-code?code='.$code);
                }

            } else {
                Yii::$app->session->setFlash('set_password_error', 'Пароли не совпадает!');
                return $this->redirect('/auth/confirm-code?code='.$code);
            }
        }else{
            return $this->render('confirm-code');
        }
    }


}