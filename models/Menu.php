<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "menu".
 *
 * @property int $id
 * @property string $text
 * @property int $status
 * @property string $metaName
 * @property string $metaDesc
 * @property string $metaKey
 */
class Menu extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'menu';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['text', 'status', 'metaName', 'metaDesc', 'metaKey','text_en','metaName_en', 'metaDesc_en', 'metaKey_en','text_kz','metaName_kz', 'metaDesc_kz', 'metaKey_kz' ], 'required'],
            [['status'], 'integer'],
            [['metaDesc', 'metaKey', 'metaDesc_en', 'metaKey_en',  'metaDesc_kz', 'metaKey_kz'], 'string'],
            [['text', 'metaName','text_en', 'metaName_en','text_kz', 'metaName_kz'], 'string', 'max' => 255],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'text' => '	Заголовок',
            'status' => 'Статус',
            'metaName' => 'Мета Названия',
            'metaDesc' => 'Мета Описание',
            'metaKey' => 'Ключевые слова',
            'text_en' => '	Заголовок (EN)',
            'metaName_en' => 'Мета Названия (EN)',
            'metaDesc_en' => 'Мета Описание (EN)',
            'metaKey_en' => 'Ключевые слова (EN)',
            'text_kz' => '	Заголовок (KZ)',
            'metaName_kz' => 'Мета Названия (KZ)',
            'metaDesc_kz' => 'Мета Описание (KZ)',
            'metaKey_kz' => 'Ключевые слова (KZ)',
        ];
    }

    public static function getList(){
        return \yii\helpers\ArrayHelper::map(\app\models\Menu::find()->all(),'id','text');
    }

    public function getName(){
        $name = "text".Yii::$app->session["lang"];
        return $this->$name;
    }

    public function getMetaN(){
        $name = "metaName".Yii::$app->session["lang"];
        return $this->$name;
    }

    public function getMetaD(){
        $name = "metaDesc".Yii::$app->session["lang"];
        return $this->$name;
    }

    public function getMetaK(){
        $name = "metaKey".Yii::$app->session["lang"];
        return $this->$name;
    }

}
