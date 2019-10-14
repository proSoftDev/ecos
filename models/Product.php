<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "product".
 *
 * @property int $id
 * @property string $name
 * @property string $contenta
 * @property string $contentb
 * @property string $keyword
 * @property string $image
 * @property string $name_en
 * @property string $contenta_en
 * @property string $contentb_en
 * @property string $keyword_en
 * @property string $name_kz
 * @property string $contenta_kz
 * @property string $contentb_kz
 * @property string $keyword_kz
 * @property int $catalog_id
 */
class Product extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */


    public static function tableName()
    {
        return 'product';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['name', 'contenta', 'contentb', 'keyword', 'name_en', 'contenta_en', 'contentb_en', 'keyword_en', 'name_kz', 'contenta_kz', 'contentb_kz', 'keyword_kz', 'catalog_id'], 'required'],
            [['contenta', 'contentb', 'keyword', 'contenta_en', 'contentb_en', 'keyword_en', 'contenta_kz', 'contentb_kz', 'keyword_kz'], 'string'],
            [['catalog_id'], 'integer'],
            [['name', 'name_en', 'name_kz'], 'string', 'max' => 255],

        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'name' => 'Название',
            'contenta' => 'Содержание',
            'contentb' => 'Применение',
            'keyword' => 'Ключевые слова',
            'name_en' => 'Название (EN)',
            'contenta_en' => 'Содержание (EN)',
            'contentb_en' => 'Применение (EN)',
            'keyword_en' => 'Ключевые слова (EN)',
            'name_kz' => 'Название (KZ)',
            'contenta_kz' => 'Содержание (KZ)',
            'contentb_kz' => 'Применение (KZ)',
            'keyword_kz' => 'Ключевые слова (KZ)',
            'catalog_id' => 'Каталог',
        ];
    }


    public function getCatalog()
    {
        return $this->hasOne(Catalog::className(), ['id' => 'catalog_id']);
    }


    public static function getList(){
        return \yii\helpers\ArrayHelper::map(Product::find()->all(),'id','name');
    }

    public function getImages(){
        return $this->hasMany(ProductImage::className(), ['product_id' => 'id']);
    }

    public function getDocuments(){
        return $this->hasMany(ProductFile::className(), ['product_id' => 'id']);
    }

    public function getName(){
        $name = "name".Yii::$app->session["lang"];
        return $this->$name;
    }

    public function getContentA(){
        $name = "contenta".Yii::$app->session["lang"];
        return $this->$name;
    }


    public function getContentB(){
        $name = "contentb".Yii::$app->session["lang"];
        return $this->$name;
    }

    public function getKeyword(){
        $name = "keyword".Yii::$app->session["lang"];
        return $this->$name;
    }

    public function getCatalogName(){
        $name = "name".Yii::$app->session["lang"];
        return $this->catalog->$name;
    }

    public static function getAllProduct(){
        return Product::find()->with('images')->all();
    }




}
