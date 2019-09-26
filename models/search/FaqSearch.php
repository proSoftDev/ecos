<?php

namespace app\models\search;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\Faq;

/**
 * FaqSearch represents the model behind the search form of `app\models\Faq`.
 */
class FaqSearch extends Faq
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id', 'status'], 'integer'],
            [['question', 'answer', 'created', 'question_en', 'answer_en', 'question_kz', 'answer_kz'], 'safe'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function scenarios()
    {
        // bypass scenarios() implementation in the parent class
        return Model::scenarios();
    }

    /**
     * Creates data provider instance with search query applied
     *
     * @param array $params
     *
     * @return ActiveDataProvider
     */
    public function search($params)
    {
        $query = Faq::find();

        // add conditions that should always apply here

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
        ]);

        $this->load($params);

        if (!$this->validate()) {
            // uncomment the following line if you do not want to return any records when validation fails
            // $query->where('0=1');
            return $dataProvider;
        }

        // grid filtering conditions
        $query->andFilterWhere([
            'id' => $this->id,
            'status' => $this->status,
            'created' => $this->created,
        ]);

        $query->andFilterWhere(['like', 'question', $this->question])
            ->andFilterWhere(['like', 'answer', $this->answer])
            ->andFilterWhere(['like', 'question_en', $this->question_en])
            ->andFilterWhere(['like', 'answer_en', $this->answer_en])
            ->andFilterWhere(['like', 'question_kz', $this->question_kz])
            ->andFilterWhere(['like', 'answer_kz', $this->answer_kz]);
        $query->orderBy('id DESC');

        return $dataProvider;
    }
}
