<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "product_image".
 *
 * @property int $id
 * @property string $image
 * @property int $product_id
 */
class ProductImage extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public $path = 'uploads/images/product/';
    public static function tableName()
    {
        return 'product_image';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['product_id'], 'integer'],
            [['image'], 'file', 'extensions' => 'png,jpg,jpeg','maxFiles' => 10],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'image' => 'Картинки',
            'product_id' => 'Продукт',
        ];
    }

    public function deleteImages($id){
        $images = ProductImage::findAll(['product_id' => $id]);
        foreach($images as $v){
            unlink($v->path . $v->image);
            $v->delete();
        }
    }

    public function getImage()
    {
        return ($this->image) ? '/uploads/images/product/' . $this->image : '/no-image.png';
    }

}
