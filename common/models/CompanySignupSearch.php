<?php

namespace common\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use common\models\CompanySignup;

/**
 * CompanySignupSearch represents the model behind the search form about `common\models\CompanySignup`.
 */
class CompanySignupSearch extends CompanySignup
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id', 'region', 'district'], 'integer'],
            [['name', 'director', 'phone', 'email', 'fax', 'address', 'index', 'product', 'file', 'mfo', 'inn', 'okonx', 'rs', 'opf', 'fs', 'soato', 'okpo', 'text'], 'safe'],
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
        $query = CompanySignup::find();

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
            'region' => $this->region,
            'district' => $this->district,
        ]);

        $query->andFilterWhere(['like', 'name', $this->name])
            ->andFilterWhere(['like', 'director', $this->director])
            ->andFilterWhere(['like', 'phone', $this->phone])
            ->andFilterWhere(['like', 'email', $this->email])
            ->andFilterWhere(['like', 'fax', $this->fax])
            ->andFilterWhere(['like', 'address', $this->address])
            ->andFilterWhere(['like', 'index', $this->index])
            ->andFilterWhere(['like', 'product', $this->product])
            ->andFilterWhere(['like', 'file', $this->file])
            ->andFilterWhere(['like', 'mfo', $this->mfo])
            ->andFilterWhere(['like', 'inn', $this->inn])
            ->andFilterWhere(['like', 'okonx', $this->okonx])
            ->andFilterWhere(['like', 'rs', $this->rs])
            ->andFilterWhere(['like', 'opf', $this->opf])
            ->andFilterWhere(['like', 'fs', $this->fs])
            ->andFilterWhere(['like', 'soato', $this->soato])
            ->andFilterWhere(['like', 'okpo', $this->okpo])
            ->andFilterWhere(['like', 'text', $this->text]);

        return $dataProvider;
    }
}
