<?php

namespace app\models;

use Yii;
use yii\helpers\ArrayHelper;

/**
 * This is the model class for table "pegawai".
 *
 * @property integer $id
 * @property integer $pegawai_type_id
 * @property string $nama
 * @property string $alamat
 * @property integer $no_telp
 *
 * @property PegawaiType $pegawaiType
 * @property Transaksi[] $transaksis
 */
class Pegawai extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'pegawai';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id', 'pegawai_type_id'], 'required'],
            [['id', 'pegawai_type_id', 'no_telp'], 'integer'],
            [['nama', 'alamat'], 'string', 'max' => 50]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'pegawai_type_id' => 'Kategori Pegawai',
            'nama' => 'Nama',
            'alamat' => 'Alamat',
            'no_telp' => 'No Telp',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getPegawaiType()
    {
        return $this->hasOne(PegawaiType::className(), ['id' => 'pegawai_type_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getTransaksis()
    {
        return $this->hasMany(Transaksi::className(), ['id_teknisi' => 'id']);
    }
	
	public function jenisPegawai(){
		$listData=ArrayHelper::map(PegawaiType::find()->all(),'id','nama');
		return $listData;
	}
	public static function nomor(){
        
        $connection = \Yii::$app->db;
        $query="    SELECT max(id) as id
                    FROM 
                    pegawai";
       $model = $connection->createCommand($query);
       $data = $model->queryAll();
	   $ret = empty($data[0]['id']) ? 111 : $data[0]['id']+1; 	   
       return $ret;

    }
	
}
