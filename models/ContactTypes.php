<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "contact_types".
 *
 * @property int $id
 * @property string $content
 * @property string $url
 * @property string $content_en
 * @property string $url_en
 * @property string $content_kz
 * @property string $url_kz
 * @property int $contact_type_id
 */
class ContactTypes extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'contact_types';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['content', 'url', 'content_en', 'content_kz','contact_type_id'], 'required'],
            [['content', 'url', 'content_en', 'content_kz'], 'string'],
            [['contact_type_id'], 'integer'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'content' => 'Содержание (RU)',
            'content_en' => 'Содержание (EN)',
            'content_kz' => 'Содержание (KZ)',
            'url' => 'Ссылка на карту',
            'contact_type_id' => 'Вид',
        ];
    }

    public function getContent(){
        $content = "content".Yii::$app->session["lang"];
        return $this->$content;
    }


    public function getContactType()
    {
        return $this->hasOne(ContactType::className(), ['id' => 'contact_type_id']);
    }
}
