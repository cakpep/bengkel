<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "produk_detail".
 *
 * @property integer $id
 * @property integer $id_produk
 * @property integer $harga_beli
 * @property integer $stok
 *
 * @property Produk $idProduk
 */
class ProdukDetail extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'produk_detail';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id'], 'required'],
            [['id', 'id_produk', 'harga_beli', 'stok'], 'integer']
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'id_produk' => 'Id Produk',
            'harga_beli' => 'Harga Beli',
            'stok' => 'Stok',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getIdProduk()
    {
        return $this->hasOne(Produk::className(), ['id' => 'id_produk']);
    }
}
