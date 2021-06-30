<?php

namespace backend\models;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use common\models\PhoneReview as PhoneReviewModel;

/**
 * PhoneReview represents the model behind the search form of `common\models\PhoneReview`.
 */
class PhoneReview extends PhoneReviewModel
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['phone_id', 'id', 'created_at', 'updated_at', 'status'], 'integer'],
            [['review'], 'safe'],
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
        $query = PhoneReviewModel::find();

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
            'phone_id' => $this->phone_id,
            'id' => $this->id,
            'created_at' => $this->created_at,
            'updated_at' => $this->updated_at,
            'status' => $this->status,
        ]);

        $query->andFilterWhere(['like', 'review', $this->review]);

        return $dataProvider;
    }
}
