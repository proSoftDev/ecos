<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "product_file".
 *
 * @property int $id
 * @property string $name
 * @property string $file
 * @property int $product_id
 * @property string $name_en
 * @property string $file_en
 * @property string $name_kz
 * @property string $file_kz
 */
class ProductFile extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public $path = 'uploads/files/product/';
    public static function tableName()
    {
        return 'product_file';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['name', 'product_id', 'name_en', 'name_kz'], 'required'],
            [['product_id'], 'integer'],
            [['name', 'name_en', 'name_kz'], 'string', 'max' => 255],
            [['file','file_en','file_kz'],'file','extensions'=>'pdf,xsl,doc']
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
            'file' => 'Документ',
            'product_id' => 'Продукт',
            'name_en' => 'Название (EN)',
            'file_en' => 'Документ (EN)',
            'name_kz' => 'Название (KZ)',
            'file_kz' => 'Документ (KZ)',
        ];
    }



    public function getFile($lang)
    {
        if($lang == '_kz'){
            return ($this->file_kz) ? '/uploads/files/product/' . $this->file_kz : '';
        }elseif($lang == '_en'){
            return ($this->file_en) ? '/uploads/files/product/' . $this->file_en : '';
        }else{
            return ($this->file) ? '/uploads/files/product/' . $this->file : '';
        }

    }


    public function getName(){
        $name = "name".Yii::$app->session["lang"];
        return $this->$name;
    }

    public function getProduct()
    {
        return $this->hasOne(Product::className(), ['id' => 'product_id']);
    }
}
