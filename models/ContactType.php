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
            [['name','name_en','name_kz'], 'required'],
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
            'name_en' => 'Заголовок (EN)',
            'name_kz' => 'Заголовок (KZ)',
        ];
    }

    public function getName(){
        $name = "name".Yii::$app->session["lang"];
        return $this->$name;
    }


    public static function getAll(){
        return ContactType::find()->limit(5)->all();
    }


    public static function getList(){
        return \yii\helpers\ArrayHelper::map(ContactType::find()->all(),'id','name');
    }

    public function getTypes(){
        return $this->hasMany(ContactTypes::className(), ['contact_type_id' => 'id']);
    }

}
