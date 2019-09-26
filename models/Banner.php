<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "banner".
 *
 * @property int $id
 * @property string $name
 * @property string $subname
 * @property string $image
 * @property string $name_en
 * @property string $subname_en
 * @property string $name_kz
 * @property string $subname_kz
 */
class Banner extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public $path = 'uploads/images/banner/';
    public static function tableName()
    {
        return 'banner';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['name', 'subname', 'name_en', 'subname_en', 'name_kz', 'subname_kz'], 'required'],
            [['name', 'subname', 'name_en', 'subname_en', 'name_kz', 'subname_kz'], 'string', 'max' => 255],
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
            'name' => 'Заголовок',
            'subname' => 'Подзаголовок',
            'image' => 'Картинка',
            'name_en' => 'Заголовок (EN)',
            'subname_en' => 'Подзаголовок (EN)',
            'name_kz' => 'Заголовок (KZ)',
            'subname_kz' => 'Подзаголовок (KZ)',
        ];
    }

    public function getImage()
    {
        return ($this->image) ? '/uploads/images/banner/' . $this->image : '/no-image.png';
    }


    public function getTitle(){
        $name = "name".Yii::$app->session["lang"];
        return $this->$name;
    }


    public function getSubTitle(){
        $name = "subname".Yii::$app->session["lang"];
        return $this->$name;
    }
}
