<?php

namespace common\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use common\models\Attach;

/**
 * AttachSearch represents the model behind the search form about `common\models\Attach`.
 */
class AttachSearch extends Attach
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id', 'section', 'parent', 'size', 'creator', 'status'], 'integer'],
            [['name', 'guid', 'extension', 'created_date'], 'safe'],
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
        $query = Attach::find();

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
            'section' => $this->section,
            'parent' => $this->parent,
            'size' => $this->size,
            'creator' => $this->creator,
            'created_date' => $this->created_date,
            'status' => $this->status,
        ]);

        $query->andFilterWhere(['like', 'name', $this->name])
            ->andFilterWhere(['like', 'guid', $this->guid])
            ->andFilterWhere(['like', 'extension', $this->extension]);

        return $dataProvider;
    }
}
