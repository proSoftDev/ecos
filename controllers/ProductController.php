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
use yii\web\NotFoundHttpException;


class ProductController extends FrontendController
{

    public function actionIndex($id)
    {
        $product = Product::findone($id);
        if(!$product){
            throw new NotFoundHttpException();
        }

        $images = $product->images;
        $documents = $product->documents;

        $model = Menu::getModel("/product/partners");
        $this->setMeta($product->getName());
        $this->setClass('cards');

        return $this->render('productin',compact('product','images','documents','model'));
    }

    public function actionPartners()
    {
        $model = Menu::getModel("/product/partners");
        $category = Catalog::getAllCategory();

        $this->setMeta($model->metaN, $model->metaK, $model->metaD);
        $this->setClass('production-partners');

        return $this->render('partner',compact('model','category'));
    }



    public function actionAll($id)
    {

        unset($_SESSION['category_id'],$_SESSION['sub_category_id'],$_SESSION['partner_id'],$_SESSION['text']);
        $model = Menu::getModel("/product/partners");
        $current_category = Catalog::findOne($id);
        if(!$current_category){
            throw new NotFoundHttpException();
        }

        $categories =  Catalog::findAll(['name' => $current_category->name]);
        if(count($categories) == 1){
            $current_partner = $current_category->parent;
            $category = Catalog::getAllCategoryByCategory($current_category);
            $_SESSION['partner_id'] = $current_partner->id;
        }else{
            $category = Catalog::getAllCategoryByCategory($current_category);
        }

        $manufacturer = Catalog::getAllCatalog();
        $subCategory = Catalog::getAllSubcategoryByCategory($categories);
        $product = Catalog::getProductsByCategory($categories, $_SESSION['text']);

//        echo '<pre>', print_r($subCategory), '</pre>';
//        print_r($product);
        $this->setClass("production");
        $this->setMeta($model->metaN, $model->metaK, $model->metaD);


        $_SESSION['category_id'] = $id;

        return $this->render('index',compact('model','product','manufacturer','category','subCategory',
            'current_category','current_partner'));
    }


    public function actionFilterGetByAll()
    {

        unset($_SESSION['category_id'],$_SESSION['sub_category_id'],$_SESSION['partner_id'],$_SESSION['text']);
        $model = Menu::getModel("/product/partners");
        $product = Product::getAllProduct();
        $manufacturer = Catalog::getAllCatalog();
        $category = Catalog::getAllCategory();
        $subCategory = Catalog::getAllSubcategory();

        return $this->renderAjax('filter', compact('product','manufacturer','category','subCategory',
            'current_partner','model','error'));
    }




    public function actionFilterGetByManufacturer()
    {

        unset($_SESSION['category_id']); unset($_SESSION['sub_category_id']);
        $model = Menu::getModel("/product/partners");
        $current_partner = Catalog::findOne($_GET['id']);
        $category = Catalog::getAllCategoryByCatalog($_GET['id']);
        $subCategory = Catalog::getAllSubcategoryByCategory($category);

        $manufacturer = Catalog::getAllCatalog();
        $product = Catalog::getProductsByCatalog($_GET['id'], $_SESSION['text']);

        $_SESSION['partner_id'] = $_GET['id'];

        return $this->renderAjax('filter', compact('product','manufacturer','category','subCategory',
            'current_partner','model','error'));
    }



    public function actionFilterGetByCategory()
    {
        unset($_SESSION['sub_category_id']);
        $_SESSION['category_id'] = $_GET['id'];

        $model = Menu::getModel("/product/partners");
        $manufacturer = Catalog::getAllCatalog();
        $current_category = Catalog::findOne($_GET['id']);
        $categories =  Catalog::findAll(['name' => $current_category->name]);

        if(!isset($_SESSION['partner_id'])){
            if(count($categories) == 1){
                $current_partner = Catalog::findOne($current_category->parent->id);
                $category = Catalog::getAllCategoryByCategory($current_category);
                $_SESSION['partner_id'] = $category->parent->id;
            }else{
                $category = Catalog::getAllCategoryByCategory($current_category);
            }
            $product = Catalog::getProductsByCategory($categories, $_SESSION['text']);
            $subCategory = Catalog::getAllSubcategoryByCategory($categories);
        }else{
            $current_partner = Catalog::findOne($current_category->parent->id);
            $category = Catalog::getAllCategoryByCatalog($current_partner->id);
            $product = Catalog::getProductsByCatalog($_GET['id'], $_SESSION['text']);
            $subCategory = Catalog::getAllSubcategoryByCategoryId($_GET['id']);
        }


        return $this->renderAjax('filter', compact('product','manufacturer','category','subCategory',
            'current_category','current_partner','model','error'));
    }




    public function actionFilterGetBySubCategory()
    {

        $model = Menu::getModel("/product/all");
        $this->setMeta($model->metaN, $model->metaK, $model->metaD);

        $current_sub_category = Catalog::findOne($_GET['id']);
        $current_category = Catalog::findOne($current_sub_category->parent->id);
        $current_partner = Catalog::findOne($current_category->parent->id);

        $manufacturer = Catalog::getAllCatalog();
        $category = Catalog::getAllCategoryByCatalog($current_category->parent->id);
        $subCategory = Catalog::getAllSubcategoryByCategoryID($current_sub_category->parent->id);

        $_SESSION['partner_id'] = $current_category->parent->id;
        $_SESSION['category_id'] = $current_sub_category->parent->id;
        $_SESSION['sub_category_id'] = $_GET['id'];

        $product = Catalog::getProductsByCatalog($_GET['id'], $_SESSION['text']);

        return $this->renderAjax('filter', compact('product','manufacturer','category','subCategory',
            'current_partner','current_category','current_sub_category','model','error'));
    }




    public function actionFilterGetBySearch()
    {

        $model = Menu::getModel("/product/all");
        $_SESSION['text'] = $_GET['text'];
        $product = Catalog::getProductsByCatalog(0, $_GET['text']);

        if(isset($_SESSION['partner_id'])){
            $product = Catalog::getProductsByCatalog($_SESSION['partner_id'], $_GET['text']);
        }

        if(isset($_SESSION['category_id'])){
            if(!isset($_SESSION['partner_id'])) {
                $current_category = Catalog::findOne($_SESSION['category_id']);
                $categories = Catalog::findAll(['name' => $current_category->name]);
                $product = Catalog::getProductsByCategory($categories, $_GET['text']);
            }else{
                $product = Catalog::getProductsByCatalog($_SESSION['category_id'], $_GET['text']);
            }
        }

        if(isset($_SESSION['sub_category_id'])) {
            $product = Catalog::getProductsByCatalog($_SESSION['category_id'], $_GET['text']);
        }

        return $this->renderAjax('search', compact('product','model','error'));
    }

}


