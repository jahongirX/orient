<?php

namespace common\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use common\models\Admission;

/**
 * AdmissionSearch represents the model behind the search form about `common\models\Admission`.
 */
class AdmissionSearch extends Admission
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id', 'order_by', 'status'], 'integer'],
            [['level_name', 'name', 'phone', 'fax', 'email', 'site', 'reception_days', 'image', 'blog', 'biography'], 'safe'],
        ];
    }

    /**
     * @inheritdoc
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
        $query = Admission::find();

        // add conditions that should always apply here

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
            'sort' => [
                'defaultOrder' => [
                    'id' => SORT_DESC,
                ],
            ],
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
            'order_by' => $this->order_by,
            'status' => $this->status,
        ]);

        $query->andFilterWhere(['like', 'level_name', $this->level_name])
            ->andFilterWhere(['like', 'name', $this->name])
            ->andFilterWhere(['like', 'phone', $this->phone])
            ->andFilterWhere(['like', 'fax', $this->fax])
            ->andFilterWhere(['like', 'email', $this->email])
            ->andFilterWhere(['like', 'site', $this->site])
            ->andFilterWhere(['like', 'reception_days', $this->reception_days])
            ->andFilterWhere(['like', 'image', $this->image])
            ->andFilterWhere(['like', 'blog', $this->blog])
            ->andFilterWhere(['like', 'biography', $this->biography]);

        return $dataProvider;
    }
}
