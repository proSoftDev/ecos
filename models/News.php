<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "news".
 *
 * @property int $id
 * @property string $name
 * @property string $content
 * @property string $image
 * @property string $created_at
 * @property string $name_en
 * @property string $content_en
 * @property string $name_kz
 * @property string $content_kz
 */
class News extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public $path = 'uploads/images/news/';
    public static function tableName()
    {
        return 'news';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['name', 'content',  'name_en', 'content_en', 'name_kz', 'content_kz'], 'required'],
            [['content', 'content_en', 'content_kz'], 'string'],
            [['created_at'], 'safe'],
            [['name', 'name_en', 'name_kz'], 'string', 'max' => 255],
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
            'created_at' => 'Дата создание',
            'name_en' => 'Название (EN)',
            'content_en' => 'Содержание (EN)',
            'name_kz' => 'Название (KZ)',
            'content_kz' => 'Содержание (KZ)',
        ];
    }

    public function getImage()
    {
        return ($this->image) ? '/uploads/images/news/' . $this->image : '/no-image.png';
    }

    public function getName(){
        $name = "name".Yii::$app->session["lang"];
        return $this->$name;
    }

    public function getContent(){
        $content = "content".Yii::$app->session["lang"];
        return $this->$content;
    }

    public static function getAll(){
        return News::find()->orderBy('id DESC')->all();
    }
}
