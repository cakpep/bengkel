<?php

namespace app\models;

use Yii;
use yii\helpers\ArrayHelper;
/**
 * This is the model class for table "transaksi_beli".
 *
 * @property string $id_beli
 * @property string $tgl_beli
 * @property integer $id_supplier
 * @property integer $id_barang
 * @property integer $jumlah_beli
 * @property integer $harga_beli
 *
 * @property Produk $idBarang
 * @property Supplier $idSupplier
 */
class TransaksiBeli extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'transaksi_beli';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id_beli'], 'required'],
            [['tgl_beli'], 'safe'],
            [['id_supplier', 'id_barang', 'jumlah_beli', 'harga_beli'], 'integer'],
            [['id_beli'], 'string', 'max' => 15]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id_beli' => 'Id Beli',
            'tgl_beli' => 'Tgl Beli',
            'id_supplier' => 'Id Supplier',
            'id_barang' => 'Id Barang',
            'jumlah_beli' => 'Jumlah Beli',
            'harga_beli' => 'Harga Beli',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getIdBarang()
    {
        return $this->hasOne(Produk::className(), ['id' => 'id_barang']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getIdSupplier()
    {
        return $this->hasOne(Supplier::className(), ['id_supplier' => 'id_supplier']);
    }
	
	public static function nomor(){
        
        $connection = \Yii::$app->db;
        $query="    SELECT max(id_beli) as id
                    FROM 
                    transaksi_beli";
       $model = $connection->createCommand($query);
       $data = $model->queryAll();
	   $ret = empty($data[0]['id']) ? 'TRNBL-0' : $data[0]['id']; 
	   $a=explode('-',$ret);		
	   $n=$a[1]+1;
	   $h="TRNBL-$n";
       return $h;

    }
	
	
	public static function laporan(){
	$connection = \Yii::$app->db;
        $query="   SELECT
tb.id_beli,
tb.tgl_beli as bulan,
sum(tb.jumlah_beli) as jumlah,
sum(tb.jumlah_beli*tb.harga_beli) subtotal
from 
transaksi_beli tb
group by left(tb.tgl_beli,7)";
		$model = $connection->createCommand($query);
		$data = $model->queryAll();

		return $data;
			
	
	}
	
	
	public static function supplier(){
		$listData=ArrayHelper::map(Supplier::find()->all(),'id_supplier','nama');
		return $listData;
	}
	public function barang(){
        $listData=ArrayHelper::map(Produk::find()->all(),'id','nama');
        return $listData;
    }
	public static function uangIndo($angka){

        $ret = !empty($angka) ? "Rp ". number_format( $angka , 2 , ',' , '.' ) : 0;

         return $ret;
    }
	
}
