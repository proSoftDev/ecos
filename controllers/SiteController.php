<?php

namespace app\controllers;


use app\models\About;
use app\models\Banner;
use app\models\Catalog;
use app\models\ContactType;
use app\models\Faq;
use app\models\Feedback;
use app\models\Menu;
use app\models\News;
use app\models\Partner;
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
        $model = Menu::find()->where('url = "/"')->one();
        $this->setMeta($model->metaN, $model->metaK, $model->metaD);
        Yii::$app->view->params['page'] = 'main';

        $banner = Banner::find()->all();
        $services = Service::find()->all();
        $catalog = Catalog::find()->where('level=1 && status=1')->orderBy('sort ASC')->all();

        return $this->render('index',compact('banner','services','catalog'));
    }


    public function actionAbout(){

        $model = Menu::find()->where('url = "/site/about"')->one();
        $this->setMeta($model->metaN, $model->metaK, $model->metaD);
        Yii::$app->view->params['page'] = 'about';

        $pageName = $model->name;
        $about = About::find()->all();
        return $this->render('about',compact('model','about'));
    }






    public function actionFaq(){

        $model = Menu::find()->where('url = "/site/faq"')->one();
        $this->setMeta($model->metaN, $model->metaK, $model->metaD);
        Yii::$app->view->params['page'] = 'question';

        $faq = Faq::find()->where('status = 1')->orderBy('id DESC')->all();
        return $this->render('faq',compact('faq','model'));
    }





    public function actionContact(){

        $model = Menu::find()->where('url = "/site/contact"')->one();
        $this->setMeta($model->metaN, $model->metaK, $model->metaD);
        Yii::$app->view->params['page'] = 'contact';

        $pageName = $model->name;
        $contact = ContactType::find()->limit(5)->all();

        return $this->render('contact',compact('pageName','contact'));
    }






    public function actionRequest()
    {

        $model = new Feedback();

        $name = $_GET['name'];
        $phone = $_GET['phone'];
        $email = $_GET['email'];
        $content = $_GET['content'];

        if($model->saveRequest($name,$phone, $email, $content))
        {
            $array = ['status' => 1];
        }else{
            $array = ['status' => 0];
        }
        return json_encode($array);
    }


    public function actionRequestEmail(){

        $name = $_GET['name'];
        $phone = $_GET['phone'];
        $email = $_GET['email'];
        $content = $_GET['content'];

        if($this->sendRequest($name,$phone, $email, $content))
        {
            $array = ['status' => 1];
        }else{
            $array = ['status' => 0];
        }

        return json_encode($array);


    }


}
