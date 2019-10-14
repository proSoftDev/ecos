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

        $this->setMeta($product->getName());
        $this->setClass('cards');

        return $this->render('productin',compact('product','images','documents'));
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
        $current_partner = $current_category->parent;
        $manufacturer = Catalog::getAllCatalog();
        $category = Catalog::getAllCategoryByCatalog($current_partner->id);
        $subCategory = Catalog::getAllSubcategoryByCategory($category);
        $product = Catalog::getProducts($id, $_SESSION['text']);

        $this->setClass("production");
        $this->setMeta($model->metaN, $model->metaK, $model->metaD);

        $_SESSION['partner_id'] = $current_partner->id;
        $_SESSION['category_id'] = $id;

        return $this->render('index',compact('model','product','manufacturer','category','subCategory',
            'current_category','current_partner'));
    }


    public function actionFilterGetByAll()
    {

        unset($_SESSION['category_id'],$_SESSION['sub_category_id'],$_SESSION['partner_id'],$_SESSION['text']);
        $model = Menu::getModel("/product/all");
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
        $model = Menu::getModel("/product/all");
        $current_partner = Catalog::findOne($_GET['id']);
        $manufacturer = Catalog::getAllCatalog();
        $category = Catalog::getAllCategoryByCatalog($_GET['id']);
        $subCategory = Catalog::getAllSubcategoryByCategory($category);
        $product = Catalog::getProducts($_GET['id'], $_SESSION['text']);

        $_SESSION['partner_id'] = $_GET['id'];

        return $this->renderAjax('filter', compact('product','manufacturer','category','subCategory',
            'current_partner','model','error'));
    }



    public function actionFilterGetByCategory()
    {
        unset($_SESSION['sub_category_id']);
        $category = Catalog::findOne($_GET['id']);

        $_SESSION['partner_id'] = $category->parent->id;
        $_SESSION['category_id'] = $_GET['id'];

        $model = Menu::getModel("/product/all");
        $current_category = Catalog::findOne($_GET['id']);
        $current_partner = Catalog::findOne($_SESSION['partner_id']);
        $manufacturer = Catalog::getAllCatalog();
        $category = Catalog::getAllCategoryByCatalog($_SESSION['partner_id']);
        $subCategory = Catalog::getAllSubcategoryByCategoryID($_GET['id']);
        $product = Catalog::getProducts($_GET['id'], $_SESSION['text']);


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


        $product = Catalog::getProducts($_GET['id'], $_SESSION['text']);

        return $this->renderAjax('filter', compact('product','manufacturer','category','subCategory',
            'current_partner','current_category','current_sub_category','model','error'));
    }




    public function actionFilterGetBySearch()
    {

        $model = Menu::getModel("/product/all");
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

        $_SESSION['text'] = $_GET['text'];
        $product = Catalog::getProducts($id, $_GET['text']);

        return $this->renderAjax('search', compact('product','model','error'));
    }

}


