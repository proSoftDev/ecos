<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "contact_type".
 *
 * @property int $id
 * @property string $name
 * @property string $content
 * @property string $name_en
 * @property string $content_en
 * @property string $name_kz
 * @property string $content_kz
 */
class ContactType extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'contact_type';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['name', 'content', 'name_en', 'content_en', 'name_kz', 'content_kz','iframe', 'iframe_en', 'iframe_kz'], 'required'],
            [['content', 'content_en', 'content_kz','iframe', 'iframe_en', 'iframe_kz'], 'string'],
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
            'name' => 'Заголовок',
            'content' => 'Содержание',
            'iframe' => 'Ссылка для карту',
            'name_en' => 'Заголовок (EN)',
            'content_en' => 'Содержание (EN)',
            'iframe_en' => 'Ссылка для карту (EN)',
            'name_kz' => 'Заголовок (KZ)',
            'content_kz' => 'Содержание (KZ)',
            'iframe_kz' => 'Ссылка для карту (KZ)',
        ];
    }

    public function getName(){
        $name = "name".Yii::$app->session["lang"];
        return $this->$name;
    }

    public function getContent(){
        $content = "content".Yii::$app->session["lang"];
        return $this->$content;
    }

    public function getIframeUrl(){
        $url = "iframe".Yii::$app->session["lang"];
        return $this->$url;
    }
}
