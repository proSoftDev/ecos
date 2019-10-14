<?php

namespace app\controllers;


use app\models\About;
use app\models\Banner;
use app\models\ContactType;
use app\models\Emailforrequest;
use app\models\Faq;
use app\models\Feedback;
use app\models\Menu;
use app\models\Service;

use Yii;
use yii\filters\AccessControl;
use yii\filters\VerbFilter;


class SiteController extends FrontendController
{

    /**
     * {@inheritdoc}
     */
    public function behaviors()
    {
        return [
            'access' => [
                'class' => AccessControl::className(),
                'only' => ['logout'],
                'rules' => [
                    [
                        'actions' => ['logout'],
                        'allow' => true,
                        'roles' => ['@'],
                    ],
                ],
            ],
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'logout' => ['post'],
                ],
            ],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function actions()
    {
        return [
            'error' => [
                'class' => 'yii\web\ErrorAction',
            ],
            'captcha' => [
                'class' => 'yii\captcha\CaptchaAction',
                'fixedVerifyCode' => YII_ENV_TEST ? 'testme' : null,
            ],
        ];
    }


    public function actionIndex()
    {
        $model = Menu::getModel("/");
        $banner = Banner::getAll();
        $services = Service::getAll();

        $this->setClass('main');
        $this->setMeta($model->metaN, $model->metaK, $model->metaD);

        return $this->render('index',compact('banner','services'));
    }


    public function actionAbout(){

        $model = Menu::getModel("/site/about");
        $about = About::getAll();

        $this->setClass('about');
        $this->setMeta($model->metaN, $model->metaK, $model->metaD);

        return $this->render('about',compact('model','about'));
    }






    public function actionFaq(){

        $model = Menu::getModel("/site/faq");
        $faq = Faq::getAll();

        $this->setClass('question');
        $this->setMeta($model->metaN, $model->metaK, $model->metaD);

        return $this->render('faq',compact('faq','model'));
    }





    public function actionContact(){


        $model = Menu::getModel("/site/contact");
        $contact = ContactType::getAll();

        $this->setClass('contact');
        $this->setMeta($model->metaN, $model->metaK, $model->metaD);

        return $this->render('contact',compact('model','contact'));
    }






    public function actionRequest()
    {
        $model = new Feedback();
        $response = $model->saveRequest($_GET['name'],$_GET['phone'], $_GET['email'], $_GET['content']);
        return json_encode($response);
    }


    public function actionRequestEmail()
    {
        $response = $this->sendRequest($_GET['name'],$_GET['phone'], $_GET['email'], $_GET['content']);
        return json_encode($response);
    }


    private function sendRequest($name,$phone, $email, $content) {

        $admin_email = Emailforrequest::getAdminEmail();
        $emailSend = Yii::$app->mailer->compose()
            ->setFrom('sdulife.kz@gmail.com')
            ->setTo($admin_email)
            ->setSubject('Клиент хочет связаться с вами')
            ->setHtmlBody("<p>ФИО: $name</p>
                                 <p>Email: $email</p>
                                 <p>Телефон: $phone</p>
                                 <p>Сообщение: $content</p>");
        if($emailSend->send()){
            $array = ['status' => 1];
        }else{
            $array = ['status' => 0];
        }

        return $array;

    }


}
