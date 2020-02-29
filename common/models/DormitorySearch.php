<?php

namespace common\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use common\models\Dormitory;

/**
 * DormitorySearch represents the model behind the search form about `common\models\Dormitory`.
 */
class DormitorySearch extends Dormitory
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id', 'country_id', 'region_id', 'district_id', 'male', 'passport_serial', 'passport_number'], 'integer'],
            [['name', 's_name', 'f_name', 'birth_date', 'address', 'student_doc', 'inn'], 'safe'],
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
        $query = Dormitory::find();

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
            'birth_date' => $this->birth_date,
            'country_id' => $this->country_id,
            'region_id' => $this->region_id,
            'district_id' => $this->district_id,
            'male' => $this->male,
            'passport_serial' => $this->passport_serial,
            'passport_number' => $this->passport_number,
        ]);

        $query->andFilterWhere(['like', 'name', $this->name])
            ->andFilterWhere(['like', 's_name', $this->s_name])
            ->andFilterWhere(['like', 'f_name', $this->f_name])
            ->andFilterWhere(['like', 'address', $this->address])
            ->andFilterWhere(['like', 'student_doc', $this->student_doc])
            ->andFilterWhere(['like', 'inn', $this->inn]);

        return $dataProvider;
    }
}
