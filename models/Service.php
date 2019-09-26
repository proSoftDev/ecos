<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "service".
 *
 * @property int $id
 * @property string $name
 * @property string $content
 * @property string $image
 * @property string $icon
 * @property string $name_en
 * @property string $content_en
 * @property string $name_kz
 * @property string $content_kz
 */
class Service extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public $path = 'uploads/images/service/';
    public static function tableName()
    {
        return 'service';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['name', 'content', 'name_en', 'content_en', 'name_kz', 'content_kz','class'], 'required'],
            [['content', 'content_en', 'content_kz'], 'string'],
            [['name', 'name_en', 'name_kz','class'], 'string', 'max' => 255],
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
            'name' => 'Название',
            'content' => 'Содержание',
            'image' => 'Картинка',
            'class' => 'Класс',
            'name_en' => 'Название (EN)',
            'content_en' => 'Содержание (EN)',
            'name_kz' => 'Название (KZ)',
            'content_kz' => 'Содержание (KZ)',
        ];
    }

    public static function getList(){
        return \yii\helpers\ArrayHelper::map(Service::find()->all(),'id','name');
    }

    public function getImage()
    {
        return ($this->image) ? '/uploads/images/service/' . $this->image : '/no-image.png';
    }

    public function getName(){
        $name = "name".Yii::$app->session["lang"];
        return $this->$name;
    }

    public function getContent(){
        $content = "content".Yii::$app->session["lang"];
        return $this->$content;
    }

}
