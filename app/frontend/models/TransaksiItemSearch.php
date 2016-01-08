<?php

namespace app\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\TransaksiItem;

/**
 * TransaksiItemSearch represents the model behind the search form about `app\models\TransaksiItem`.
 */
class TransaksiItemSearch extends TransaksiItem
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id', 'transaksi_id', 'produk_id', 'jumlah'], 'integer'],
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
        $query = TransaksiItem::find();

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
            'id' => $this->id,
            'transaksi_id' => $this->transaksi_id,
            'produk_id' => $this->produk_id,
            'jumlah' => $this->jumlah,
        ]);

        return $dataProvider;
    }
}
