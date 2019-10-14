<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "faq".
 *
 * @property int $id
 * @property string $question
 * @property string $answer
 * @property int $status
 * @property string $created
 * @property string $question_en
 * @property string $answer_en
 * @property string $question_kz
 * @property string $answer_kz
 */
class Faq extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'faq';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['question', 'answer', 'status', 'question_en', 'answer_en', 'question_kz', 'answer_kz'], 'required'],
            [['question', 'answer', 'question_en', 'answer_en', 'question_kz', 'answer_kz'], 'string'],
            [['status'], 'integer'],
            [['created'], 'safe'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'question' => 'Вопрос',
            'answer' => 'Ответ',
            'status' => 'Статус',
            'created' => 'Дата создание',
            'question_en' => 'Вопрос (EN)',
            'answer_en' => 'Ответ (EN)',
            'question_kz' => 'Вопрос (KZ)',
            'answer_kz' => 'Ответ (KZ)',
        ];
    }

    public function getAnswer(){
        $name = "answer".Yii::$app->session["lang"];
        return $this->$name;
    }

    public function getQuestion(){
        $name = "question".Yii::$app->session["lang"];
        return $this->$name;
    }

    public static function getAll(){
        return Faq::find()->where('status = 1')->orderBy('id DESC')->all();
    }
}
