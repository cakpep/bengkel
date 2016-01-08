<?php

namespace app\models;

use Yii;
use yii\helpers\ArrayHelper;
/**
 * This is the model class for table "pelanggan".
 *
 * @property string $id_pelanggan
 * @property string $nama
 * @property string $alamat
 * @property string $telp
 * @property integer $tipe_kendaraan
 * @property string $no_polisi
 *
 * @property Transaksi[] $transaksis
 */
class Pelanggan extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'pelanggan';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id_pelanggan'], 'required'],
            [['tipe_kendaraan'], 'integer'],
            [['id_pelanggan'], 'string', 'max' => 11],
            [['nama', 'alamat'], 'string', 'max' => 50],
            [['telp'], 'string', 'max' => 15],
            [['no_polisi'], 'string', 'max' => 10]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id_pelanggan' => 'Id Pelanggan',
            'nama' => 'Nama',
            'alamat' => 'Alamat',
            'telp' => 'Telp',
            'tipe_kendaraan' => 'Tipe Kendaraan',
            'no_polisi' => 'No Polisi',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getTransaksis()
    {
        return $this->hasMany(Transaksi::className(), ['id_pelanggan' => 'id_pelanggan']);
    }
	
	public function getTipeKendaraan()
    {
        return $this->hasOne(TipeKendaraan::className(), ['id_tipe' => 'tipe_kendaraan']);
    }
	public static function nomor(){
        
        $connection = \Yii::$app->db;
        $query="    SELECT max(id_pelanggan) as id
                    FROM 
                    pelanggan";
       $model = $connection->createCommand($query);
       $data = $model->queryAll();
	   $ret = empty($data[0]['id']) ? 'PLG-0' : $data[0]['id']; 
	   $a=explode('-',$ret);		
	   $n=$a[1]+1;
	   $h="PLG-$n";
       return $h;

    }
	
	public static function tipeKendaraan(){
		$listData=ArrayHelper::map(TipeKendaraan::find()->all(),'id_tipe','nama_tipe');
		return $listData;
	}
}
