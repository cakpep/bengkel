<?php

namespace app\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\TransaksiBeli;

/**
 * TransaksiBeliSearch represents the model behind the search form about `app\models\TransaksiBeli`.
 */
class TransaksiBeliSearch extends TransaksiBeli
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id_beli', 'tgl_beli'], 'safe'],
            [['id_supplier', 'id_barang', 'jumlah_beli', 'harga_beli'], 'integer'],
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
        $query = TransaksiBeli::find();

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
            'tgl_beli' => $this->tgl_beli,
            'id_supplier' => $this->id_supplier,
            'id_barang' => $this->id_barang,
            'jumlah_beli' => $this->jumlah_beli,
            'harga_beli' => $this->harga_beli,
        ]);

        $query->andFilterWhere(['like', 'id_beli', $this->id_beli]);

        return $dataProvider;
    }
}
