<?php

namespace common\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use common\models\Reception;

/**
 * ReceptionSearch represents the model behind the search form about `common\models\Reception`.
 */
class ReceptionSearch extends Reception
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id', 'index', 'admissionId', 'time', 'status'], 'integer'],
            [['name', 'email', 'phone', 'address', 'person_type', 'firm_name', 'passport', 'text', 'uniqid'], 'safe'],
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
        $query = Reception::find();

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
            'index' => $this->index,
            'admissionId' => $this->admissionId,
            'time' => $this->time,
            'status' => $this->status,
        ]);

        $query->andFilterWhere(['like', 'name', $this->name])
            ->andFilterWhere(['like', 'email', $this->email])
            ->andFilterWhere(['like', 'phone', $this->phone])
            ->andFilterWhere(['like', 'address', $this->address])
            ->andFilterWhere(['like', 'person_type', $this->person_type])
            ->andFilterWhere(['like', 'firm_name', $this->firm_name])
            ->andFilterWhere(['like', 'passport', $this->passport])
            ->andFilterWhere(['like', 'text', $this->text])
            ->andFilterWhere(['like', 'uniqid', $this->uniqid]);

        return $dataProvider;
    }
}
