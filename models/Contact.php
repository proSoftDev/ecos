<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "contact".
 *
 * @property int $id
 * @property string $address
 * @property string $tel
 * @property string $fax
 * @property string $email
 * @property string $address_en
 * @property string $address_kz
 */
class Contact extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'contact';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['address', 'tel', 'fax', 'email', 'address_en', 'address_kz'], 'required'],
            [['address', 'address_en', 'address_kz'], 'string'],
            [['tel', 'fax', 'email'], 'string', 'max' => 255],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'address' => 'Адрес',
            'tel' => 'Телефон',
            'fax' => 'Факс',
            'email' => 'Эл. почта',
            'address_en' => 'Адрес (EN)',
            'address_kz' => 'Адрес (KZ)',
        ];
    }

    public function getAddress(){
        $name = "address".Yii::$app->session["lang"];
        return $this->$name;
    }
}
