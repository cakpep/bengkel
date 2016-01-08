<?php

namespace app\models;

use Yii;
use yii\helpers\ArrayHelper;

/**
 * This is the model class for table "produk".
 *
 * @property integer $id
 * @property integer $type_id
 * @property string $nama
 * @property integer $harga
 * @property double $diskon
 *
 * @property ProdukType $type
 * @property ProdukDetail[] $produkDetails
 * @property TransaksiItem[] $transaksiItems
 */
class Produk extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'produk';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['type_id', 'harga'], 'integer'],
            [['stok'], 'number'],
            [['nama'], 'string', 'max' => 50]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'type_id' => 'Tipe Produk',
            'nama' => 'Nama',
            'harga' => 'Harga',
            'stok' => 'Diskon',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getType()
    {
        return $this->hasOne(ProdukType::className(), ['id' => 'type_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getProdukDetails()
    {
        return $this->hasMany(ProdukDetail::className(), ['id_produk' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getTransaksiItems()
    {
        return $this->hasMany(TransaksiItem::className(), ['produk_id' => 'id']);
    }
	public function tipeproduk(){
		$listData=ArrayHelper::map(ProdukType::find()->all(),'id','nama');
		return $listData;
	}
}
