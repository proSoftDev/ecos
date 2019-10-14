<?php
/**
 * Created by PhpStorm.
 * User: Юрий
 * Date: 28.08.2018
 * Time: 9:34
 */


namespace app\controllers;


use app\models\About;
use app\models\Catalog;
use app\models\Faq;
use app\models\Menu;
use app\models\News;
use app\models\Partner;
use app\models\Product;
use app\models\Service;
use Yii;
use yii\web\Controller;

class SearchController extends FrontendController
{


    public function actionIndex($text)
    {
        Yii::$app->view->params['page'] = 'services';
        $this->setMeta('Поиск', "", "");
        $search = $text;
		if($text){
            $menu = Menu::find()->all();
            $name = 'name'.Yii::$app->session['lang'];
            $content = 'content'.Yii::$app->session['lang'];
            $contentA = 'contenta'.Yii::$app->session['lang'];
            $question = 'question'.Yii::$app->session['lang'];
            $answer = 'answer'.Yii::$app->session['lang'];

			$about = About::find()->where($content." LIKE '%$text%' OR ".$name." LIKE '%$text%'")->all();
			$fao = Faq::find()->where($question." LIKE '%$text%' OR ".$answer." LIKE '%$text%'")->all();
			$news = News::find()->where($content." LIKE '%$text%' OR ".$name." LIKE '%$text%'")->all();
            $partner = Catalog::find()->where("level = 1 AND status = 1 AND (".$content." LIKE '%$text%' OR ".$name." LIKE '%$text%')")->all();
            $service = Service::find()->where($content." LIKE '%$text%' OR ".$name." LIKE '%$text%'")->all();
            $product = Product::find()->where($contentA." LIKE '%$text%' OR ".$name." LIKE '%$text%'")->all();
			$count = count($about) + count($fao) + count($news) + count($partner) + count($service)+ count($product);

        }else{
		    $count = 0;
			return $this->render('index', compact('search', 'count', 'text'));
		}

        return $this->render('index', compact('about','fao','news','partner','service','menu','count','search','product'));
    }
}