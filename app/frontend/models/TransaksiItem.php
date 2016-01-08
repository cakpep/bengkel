<?php

namespace app\models;

use Yii;
use yii\helpers\ArrayHelper;
/**
 * This is the model class for table "transaksi_item".
 *
 * @property integer $id
 * @property integer $transaksi_id
 * @property integer $produk_id
 * @property integer $jumlah
 * @property double $diskon
 * @property integer $subtotal
 *
 * @property Transaksi $transaksi
 * @property Produk $produk
 */
class TransaksiItem extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'transaksi_item';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['transaksi_id', 'produk_id', 'jumlah', 'subtotal'], 'integer'],
            [['diskon'], 'integer'],
            [['produk_id'],'safe'],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'transaksi_id' => 'Transaksi ID',
            'produk_id' => 'Produk ID',
            'jumlah' => 'Jumlah',
            'diskon' => 'Diskon',
            'subtotal' => 'Subtotal',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getTransaksi()
    {
        return $this->hasOne(Transaksi::className(), ['id' => 'transaksi_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getProduk()
    {
        return $this->hasOne(Produk::className(), ['id' => 'produk_id']);
    }

    public function Produk(){
        $listData=ArrayHelper::map(Produk::find()->all(),'id','nama');
        return $listData;
    }
}
