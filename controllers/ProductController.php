<?php
/**
 * Created by PhpStorm.
 * User: admin
 * Date: 23.09.2019
 * Time: 16:06
 */

namespace app\controllers;


use app\models\Catalog;
use app\models\Menu;
use app\models\Product;
use app\models\ProductFile;
use app\models\ProductImage;
use Yii;

class ProductController extends FrontendController
{

    public function actionIndex($id)
    {
        $model = Menu::find()->where('url = "/product/partners"')->one();
        $product = Product::findone($id);
        $images = ProductImage::findAll(['product_id'=>$id]);
        $documents = ProductFile::findAll(['product_id'=>$id]);
        $this->setMeta($product->getName(),null, null);
        Yii::$app->view->params['page'] = 'cards';

        return $this->render('productin',compact('product','model','images','documents'));
    }

    public function actionPartners()
    {
        $model = Menu::find()->where('url = "/product/partners"')->one();
        $this->setMeta($model->metaN, $model->metaK, $model->metaD);
        Yii::$app->view->params['page'] = 'production-partners';

        return $this->render('partner',compact('model'));
    }



    public function actionAll($id)
    {

        unset($_SESSION['category_id'],$_SESSION['sub_category_id'],$_SESSION['partner_id'],$_SESSION['text']);
        $model = Menu::find()->where('url = "/product/partners"')->one();
        $this->setMeta($model->metaN, $model->metaK, $model->metaD);
        Yii::$app->view->params['page'] = 'production';

        $_SESSION['partner_id'] = $id;
        $current_partner = Catalog::findOne($id);
        $manufacturer = Catalog::find()->where('status = 1 AND level = 1')->all();

        $category = Catalog::find()->where('status = 1 AND level = 2 AND parent_id='.$id)->all();

        if($category != null){
            $arr = '(';
            foreach ($category as $v){
                $arr.=$v->id.',';
            }
            $arr = substr($arr,0,strlen($arr)-1);
            $arr.= ')';
            $subCategory = Catalog::find()->where('status = 1 AND level = 3 AND parent_id in '.$arr)->all();
        }

        $product = Catalog::getProducts($id, $_SESSION['text']);

        return $this->render('index',compact('model','product','manufacturer','category','subCategory','current_partner'));
    }


    public function actionFilterGetByAll()
    {

        unset($_SESSION['category_id'],$_SESSION['sub_category_id'],$_SESSION['partner_id'],$_SESSION['text']);
        $model = Menu::find()->where('url = "/product/all"')->one();

        $product = Product::find()->with('images')->all();
        $manufacturer = Catalog::find()->where('status = 1 AND level = 1')->all();
        $category = Catalog::find()->where('status = 1 AND level = 2')->all();
        $subCategory = Catalog::find()->where('status = 1 AND level = 3')->all();


        return $this->renderAjax('filter', compact('product','manufacturer','category','subCategory',
            'current_partner','model','error'));
    }




    public function actionFilterGetByManufacturer()
    {

        unset($_SESSION['category_id']); unset($_SESSION['sub_category_id']);
        $model = Menu::find()->where('url = "/product/all"')->one();

        $partner_id = $_GET['id'];
        $_SESSION['partner_id'] = $partner_id;
        $current_partner = Catalog::findOne($partner_id);
        $manufacturer = Catalog::find()->where('status = 1 AND level = 1')->all();

        $category = Catalog::find()->where('status = 1 AND level = 2 AND parent_id='.$partner_id)->all();

        if($category != null){
            $arr = '(';
            foreach ($category as $v){
                $arr.=$v->id.',';
            }
            $arr = substr($arr,0,strlen($arr)-1);
            $arr.= ')';
            $subCategory = Catalog::find()->where('status = 1 AND level = 3 AND parent_id in '.$arr)->all();
        }

        $product = Catalog::getProducts($partner_id, $_SESSION['text']);

        return $this->renderAjax('filter', compact('product','manufacturer','category','subCategory',
            'current_partner','model','error'));
    }



    public function actionFilterGetByCategory()
    {
        unset($_SESSION['sub_category_id']);
        $model = Menu::find()->where('url = "/product/all"')->one();
        $this->setMeta($model->metaN, $model->metaK, $model->metaD);


        $category_id = $_GET['id'];
        $category = Catalog::findOne($category_id);
        $_SESSION['partner_id'] = $category->parent->id;
        $_SESSION['category_id'] = $category_id;

        $current_category = Catalog::findOne($category_id);
        $current_partner = Catalog::findOne($_SESSION['partner_id']);

        $manufacturer = Catalog::find()->where('status = 1 AND level = 1')->all();
        if(isset($_SESSION['partner_id']))
            $category = Catalog::find()->where('status = 1 AND level = 2 AND parent_id='.$_SESSION['partner_id'])->all();
        else
            $category = Catalog::find()->where('status = 1 AND level = 2')->all();


        $subCategory = Catalog::find()->where('status = 1 AND level = 3 AND parent_id = '.$category_id)->all();

        $product = Catalog::getProducts($category_id, $_SESSION['text']);

        return $this->renderAjax('filter', compact('product','manufacturer','category','subCategory',
            'current_category','current_partner','model','error'));
    }




    public function actionFilterGetBySubCategory()
    {

        $model = Menu::find()->where('url = "/product/all"')->one();
        $this->setMeta($model->metaN, $model->metaK, $model->metaD);

        $sub_category_id = $_GET['id'];
        $current_sub_category = Catalog::findOne($sub_category_id);

        $category_id = $current_sub_category->parent->id;
        $current_category = Catalog::findOne($category_id);

        $partner_id = $current_category->parent->id;
        $current_partner = Catalog::findOne($partner_id);

        $_SESSION['partner_id'] = $partner_id;
        $_SESSION['category_id'] = $category_id;
        $_SESSION['sub_category_id'] = $sub_category_id;


        $manufacturer = Catalog::find()->where('status = 1 AND level = 1')->all();
        $category = Catalog::find()->where('status = 1 AND parent_id = '.$partner_id)->all();
        $subCategory = Catalog::find()->where('status = 1 AND id='.$sub_category_id)->all();


        $product = Catalog::getProducts($sub_category_id, $_SESSION['text']);

        return $this->renderAjax('filter', compact('product','manufacturer','category','subCategory',
            'current_partner','current_category','current_sub_category','model','error'));
    }






    public function actionFilterGetBySearch()
    {

        $model = Menu::find()->where('url = "/product/all"')->one();
        $id = 0;

        if(isset($_SESSION['partner_id'])){
            $id = $_SESSION['partner_id'];

        }

        if(isset($_SESSION['category_id'])){
            $id = $_SESSION['category_id'];
        }


        if(isset($_SESSION['sub_category_id'])) {
            $id = $_SESSION['category_id'];
        }

        $text = $_GET['text'];
        $_SESSION['text'] = $text;
        $product = Catalog::getProducts($id, $text);



        return $this->renderAjax('search', compact('product','manufacturer','category','subCategory',
            'current_partner','current_category','current_sub_category','text','model','error'));
    }

}


