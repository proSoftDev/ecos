<?php

namespace app\models;

use Yii;
use yii\helpers\ArrayHelper;

/**
 * This is the model class for table "catalog".
 *
 * @property int $id
 * @property int $parent_id
 * @property string $name
 * @property int $level
 * @property int $sort
 * @property int $status
 * @property string $created_at
 * @property string $name_en
 * @property string $name_kz
 */
class Catalog extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public $path = 'uploads/images/partner/';
    public static function tableName()
    {
        return 'catalog';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['name', 'status', 'name_en', 'name_kz'], 'required'],
            [['parent_id', 'level', 'sort', 'status'], 'integer'],
            [['created_at'], 'safe'],
            [['name', 'name_en', 'name_kz'], 'string', 'max' => 255],
            [['content', 'content_en', 'content_kz'], 'string'],
            [['image'], 'file', 'extensions' => 'png,jpg'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'parent_id' => 'Родитель',
            'name' => 'Название',
            'image' => 'Картинка',
            'content' => 'Содержание',
            'level' => 'Level',
            'sort' => 'Sort',
            'status' => 'Статус',
            'created_at' => 'Дата создание',
            'name_en' => 'Название (EN)',
            'content_en' => 'Содержание (EN)',
            'name_kz' => 'Название (KZ)',
            'content_kz' => 'Содержание (KZ)',
        ];
    }

    public function beforeSave($insert){
        if($this->isNewRecord) {
            $model = Catalog::find()->orderBy('sort DESC')->one();
            if (!$model || $this->id != $model->id) {
                $this->sort = $model->sort + 1;
            }
        }
        return parent::beforeSave($insert);
    }

    public function getParent()
    {
        return $this->hasOne(Catalog::className(), ['id' => 'parent_id']);
    }

    public static function getList(){
        $data = Catalog::find()->all();
        $res = array();
        foreach ($data as $v){
            if($v->parent->name != null){
                $res[$v->id] = $v->name." (".$v->parent->name.")";
            }else{
                $res[$v->id] = $v->name;
            }
        }
        return $res;
    }

    public function getName(){
        $name = "name".Yii::$app->session["lang"];
        return $this->$name;
    }

    public function getNameWithParent(){
        $name = "name".Yii::$app->session["lang"];
        if($this->parent->name != null) {
            $res =  $this->$name . " (" . $this->parent->name . ")";
        }else{
            $res =  $this->$name;
        }

        return$res;
    }

    public function getContent(){
        $content = "content".Yii::$app->session["lang"];
        return $this->$content;
    }

    public function getImage()
    {
        return ($this->image) ? '/uploads/images/partner/' . $this->image : '/no-image.png';
    }

    public static function getAllCatalog(){
        return Catalog::find()->where('level=1 && status=1')->orderBy('sort ASC')->all();
    }

    public static function getAllCategory(){
        return Catalog::find()->where('level=2 && status=1')->orderBy('sort ASC')
            ->groupBy("name")->all();
    }

    public static function getAllSubcategory(){
        return Catalog::find()->where('level=3 && status=1')->orderBy('sort ASC')
            ->groupBy("name")->all();
    }

    public static function getAllCategoryByCategory($current_category){

        $categories =  Catalog::findAll(['name' => $current_category->name]);
        if(count($categories) == 1){
            $data =  Catalog::find()->where('status = 1 AND level = 2 AND parent_id = '.$current_category->parent->id)
                ->orderBy('sort ASC')->groupBy('name')->all();
        }else{
            foreach ($categories as $v){
                $arr[] = $v->parent->id;
            }

            $data = Catalog::find()->where('status = 1 AND level = 2 AND parent_id in (' . implode(',', $arr) . ')')
                ->orderBy('sort ASC')->groupBy('name')->all();
        }
        return $data;
    }

    public static function getAllCategoryByCatalog($id){
        return Catalog::find()->where('status = 1 AND level = 2 AND parent_id = '.$id)
            ->orderBy('sort ASC')->all();
    }

    public static function getAllSubcategoryByCategory($category){

        if($category != null){
            $arr = '(';
            foreach ($category as $v){
                $arr.=$v->id.',';
            }
            $arr = substr($arr,0,strlen($arr)-1);
            $arr.= ')';
            $subCategory = Catalog::find()->where('status = 1 AND level = 3 AND parent_id in '.$arr)
                ->orderBy('sort ASC')->groupBy('name')->all();
        }else{
            $subCategory = null;
        }
        return $subCategory;
    }


    public static function getAllSubcategoryByCategoryID($category_id){
      return Catalog::find()->where('status = 1 AND level = 3 AND parent_id='.$category_id)->all();
    }


    public static function getProductsByCategory($category, $text = "")
    {
        $arr = [];
        foreach ($category as $v) {
            if(!in_array($v->id,$arr)) $arr[] = $v->id;
            $level2 = Catalog::findAll(['parent_id' => $v->id]);
            if ($level2 != null) {
                foreach ($level2 as $v2) {
                    if ($v2->parent_id == $v->id) {
                        if(!in_array($v2->id,$arr)) $arr[] = $v2->id;
                        $level3 = Catalog::findAll(['parent_id' => $v2->id]);
                        if ($level3 != null) {
                            foreach ($level3 as $v3) {
                                if ($v3->parent_id == $v2->id) {
                                    if(!in_array($v3->id,$arr)) $arr[] = $v3->id;
                                    $level4 = Catalog::findAll(['parent_id' => $v3->id]);
                                    if ($level4 != null) {
                                        foreach ($level4 as $v4) {
                                            if ($v4->parent_id == $v3->id) {
                                                if(!in_array($v4->id,$arr)) $arr[] = $v4->id;
                                            }
                                        }
                                    }
                                }
                            }
                        }
                    }
                }
            }

        }


        if ($arr)
            if ($text != null) {
                $name = 'name' . Yii::$app->session['lang'];
                $product = Product::find()->where("catalog_id in (" . implode(",", $arr) . ") AND " . $name . " LIKE '%$text%'")->all();
            } else {
                $product = Product::find()->where('catalog_id in (' . implode(',', $arr) . ')')->all();
            }
        return $product;

    }



    public static function getProductsByCatalog($id, $text = "")
    {
        $arr = [];
        $partner = Catalog::find()->all();
        $arr[] = $id;
        foreach ($partner as $v) {
            if ($v->parent_id == $id) {
                $arr[] = $v->id;
                $level2 = Catalog::findAll(['parent_id' => $v->id]);
                if ($level2 != null) {
                    foreach ($level2 as $v2) {
                        if ($v2->parent_id == $v->id) {
                            $arr[] = $v2->id;
                            $level3 = Catalog::findAll(['parent_id' => $v2->id]);
                            if ($level3 != null) {
                                foreach ($level3 as $v3) {
                                    if ($v3->parent_id == $v2->id) {
                                        $arr[] = $v3->id;
                                        $level4 = Catalog::findAll(['parent_id' => $v3->id]);
                                        if ($level4 != null) {
                                            foreach ($level4 as $v4) {
                                                if ($v4->parent_id == $v3->id) {
                                                    $arr[] = $v4->id;
                                                }
                                            }
                                        }
                                    }
                                }
                            }
                        }
                    }
                }
            }
        }

        if ($arr)
            if ($text != null) {
                $name = 'name' . Yii::$app->session['lang'];
                $product = Product::find()->where("catalog_id in (" . implode(",", $arr) . ") AND " . $name . " LIKE '%$text%'")->all();
            } else {
                $product = Product::find()->where('catalog_id in (' . implode(',', $arr) . ')')->all();
            }
        return $product;
    }



}
