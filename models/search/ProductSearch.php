<?php

namespace app\models\search;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\Product;

/**
 * ProductSearch represents the model behind the search form of `app\models\Product`.
 */
class ProductSearch extends Product
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id', 'catalog_id'], 'integer'],
            [['name', 'contenta', 'contentb', 'keyword', 'name_en', 'contenta_en', 'contentb_en', 'keyword_en', 'name_kz', 'contenta_kz', 'contentb_kz', 'keyword_kz'], 'safe'],
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
        $query = Product::find();

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
            'catalog_id' => $this->catalog_id,
        ]);

        $query->andFilterWhere(['like', 'name', $this->name])
            ->andFilterWhere(['like', 'contenta', $this->contenta])
            ->andFilterWhere(['like', 'contentb', $this->contentb])
            ->andFilterWhere(['like', 'keyword', $this->keyword])
            ->andFilterWhere(['like', 'name_en', $this->name_en])
            ->andFilterWhere(['like', 'contenta_en', $this->contenta_en])
            ->andFilterWhere(['like', 'contentb_en', $this->contentb_en])
            ->andFilterWhere(['like', 'keyword_en', $this->keyword_en])
            ->andFilterWhere(['like', 'name_kz', $this->name_kz])
            ->andFilterWhere(['like', 'contenta_kz', $this->contenta_kz])
            ->andFilterWhere(['like', 'contentb_kz', $this->contentb_kz])
            ->andFilterWhere(['like', 'keyword_kz', $this->keyword_kz]);

        return $dataProvider;
    }
}
