<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "about".
 *
 * @property int $id
 * @property string $name
 * @property string $content
 * @property string $name_en
 * @property string $content_en
 * @property string $name_kz
 * @property string $content_kz
 */
class About extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */

    public static function tableName()
    {
        return 'about';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['name', 'content', 'name_en', 'content_en', 'name_kz', 'content_kz'], 'required'],
            [['content', 'content_en', 'content_kz'], 'string'],
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
            'name_en' => 'Заголовок (EN)',
            'content_en' => 'Содержание (EN)',
            'name_kz' => 'Заголовок (KZ)',
            'content_kz' => 'Содержание (KZ)',
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

    public static function getAll(){
        return About::find()->all();
    }
}
