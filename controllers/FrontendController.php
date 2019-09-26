<?php
/**
 * Created by PhpStorm.
 * User: admin
 * Date: 01.04.2019
 * Time: 11:45
 */

namespace app\controllers;


use app\models\Catalog;
use app\models\Category;
use app\models\Company;
use app\models\Contact;
use app\models\Emailforrequest;
use app\models\Feedback;
use app\models\Menu;
use app\models\Partner;
use app\models\Product;
use app\models\SignupForm;
use app\models\SocialNetwork;
use app\models\Translation;
use app\models\UserProfile;
use Yii;
use yii\web\Controller;

class FrontendController extends Controller
{

    public function init()
    {

        $menu = Menu::find()->where('status=1')->orderBy('sort asc')->limit(7)->all();
        $main = Menu::findOne(['id'=>1]);
        $about = Menu::findOne(['status'=>1,'id'=>2]);
        $product = Menu::findOne(['status'=>1,'id'=>4]);
        $service = Menu::findOne(['status'=>1,'id'=>3]);
        $security = Menu::findOne(['status'=>1,'id'=>9]);
        $news = Menu::findOne(['status'=>1,'id'=>8]);

        Yii::$app->view->params['main'] = $main;
        Yii::$app->view->params['headerMenu'] = $menu;
        Yii::$app->view->params['footerMenu'][0] = $about;
        Yii::$app->view->params['footerMenu'][1] = $product;
        Yii::$app->view->params['footerMenu'][2] = $service;
        Yii::$app->view->params['footerMenu'][3] = $security;
        Yii::$app->view->params['footerMenu'][4] = $news;


        $contact = contact::find()->one();
        $translation = Translation::find()->all();
        $partner = Catalog::find()->where('level=1 && status=1')->orderBy('sort ASC')->all();
        Yii::$app->view->params['contact'] = $contact;
        Yii::$app->view->params['translation'] = $translation;
        Yii::$app->view->params['partner'] = $partner;

    }



    protected function setMeta($title = null, $keywords = null, $description = null){
        $this->view->title = $title;
        $this->view->registerMetaTag(['name' => 'keywords', 'content' => "$keywords"]);
        $this->view->registerMetaTag(['name' => 'description', 'content' => "$description"]);
    }


    protected function sendNewPassword($email, $code) {
        $emailSend = Yii::$app->mailer->compose()
            ->setFrom('sdulife.kz@gmail.com')
            ->setTo($email)
//            ->setSubject('Update password')

            ->setHtmlBody("<p> Код для изменение пароля : $code</p>");
        return $emailSend->send();

    }

}