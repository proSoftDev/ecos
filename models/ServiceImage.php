<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "service_image".
 *
 * @property int $id
 * @property string $image
 * @property int $service_id
 */
class ServiceImage extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public $path = 'uploads/images/service/';
    public static function tableName()
    {
        return 'service_image';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['image', 'service_id'], 'required'],
            [['service_id'], 'integer'],
            [['image'], 'file', 'extensions' => 'png,jpg,jpeg','maxFiles' => 10],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'image' => 'Картинка',
            'service_id' => 'Услуга',
        ];
    }

    public function getImage()
    {
        return ($this->image) ? '/uploads/images/service/' . $this->image : '/no-image.png';
    }

    public function getService()
    {
        return $this->hasOne(Service::className(), ['id' => 'service_id']);
    }
}
