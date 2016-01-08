<?php

namespace app\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\TipeKendaraan;

/**
 * TipeKendaraanSearch represents the model behind the search form about `app\models\TipeKendaraan`.
 */
class TipeKendaraanSearch extends TipeKendaraan
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id_tipe'], 'integer'],
            [['nama_tipe'], 'safe'],
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
        $query = TipeKendaraan::find();

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
        ]);

        $this->load($params);

        if (!$this->validate()) {
            // uncomment the following line if you do not want to return any records when validation fails
            // $query->where('0=1');
            return $dataProvider;
        }

        $query->andFilterWhere([
            'id_tipe' => $this->id_tipe,
        ]);

        $query->andFilterWhere(['like', 'nama_tipe', $this->nama_tipe]);

        return $dataProvider;
    }
}
