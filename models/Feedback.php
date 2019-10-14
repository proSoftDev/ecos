<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "feedback".
 *
 * @property int $id
 * @property string $fio
 * @property string $telephone
 * @property string $email
 * @property string $content
 * @property int $isRead
 */
class Feedback extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'feedback';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['fio', 'telephone', 'email', 'content', 'isRead'], 'required'],
            [['content'], 'string'],
            [['isRead'], 'integer'],
            [['fio', 'telephone'], 'string', 'max' => 255],
            [['email'],'email']
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'fio' => 'Фио',
            'telephone' => 'Телефон',
            'email' => 'E-mail',
            'content' => 'Сообщение',
            'isRead' => 'Прочитано',
            'created' => 'Дата создание',
        ];
    }

    public function saveRequest($name,$phone, $email, $content){
        $this->fio = $name;
        $this->telephone = $phone;
        $this->email = $email;
        $this->content = $content;
        $this->isRead = 0;
        if($this->save(false)){
            $array = ['status' => 1];
        }else{
            $array = ['status' => 0];
        }
        return $array;
    }
}
