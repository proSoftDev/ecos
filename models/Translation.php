<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "translation".
 *
 * @property int $id
 * @property string $name
 * @property string $name_en
 * @property string $name_kz
 */
class Translation extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'translation';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['name', 'name_en', 'name_kz'], 'required'],
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
            'name' => 'Текст',
            'name_en' => 'Текст (EN)',
            'name_kz' => 'Текст (KZ)',
        ];
    }

    public function getText(){
        $name = "name".Yii::$app->session["lang"];
        return $this->$name;
    }
}
