<?php

namespace app\models;

use Yii;
use yii\helpers\ArrayHelper;
/**
 * This is the model class for table "transaksi".
 *
 * @property integer $id
 * @property string $kode_transaksi
 * @property string $tanggal
 * @property integer $id_pelanggan
 * @property integer $id_teknisi
 *
 * @property Pegawai $idTeknisi
 * @property Pelanggan $idPelanggan
 * @property TransaksiItem[] $transaksiItems
 */
class Transaksi extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'transaksi';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['kode_transaksi'], 'required'],
            [['tanggal','id_pelanggan'], 'safe'],
            [[ 'id_teknisi'], 'integer'],
            [['kode_transaksi'], 'string', 'max' => 10]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'kode_transaksi' => 'Kode Transaksi',
            'tanggal' => 'Tanggal',
            'id_pelanggan' => 'Nama Pelanggan',
            'id_teknisi' => 'nama Teknisi',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getIdTeknisi()
    {
        return $this->hasOne(Pegawai::className(), ['id' => 'id_teknisi']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getIdPelanggan()
    {
        return $this->hasOne(Pelanggan::className(), ['id_pelanggan' => 'id_pelanggan']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getTransaksiItems()
    {
        return $this->hasMany(TransaksiItem::className(), ['transaksi_id' => 'id']);
    }




    public static function items($p){
        
        $connection = \Yii::$app->db;
        $query="    SELECT 
                    ti.`id`,
                    ti.`transaksi_id`,
                    p.`nama`,
                    ti.`diskon`,
                    ti.`jumlah`,
                    ti.`subtotal`
                    FROM 
                    transaksi_item ti JOIN produk p ON ti.`produk_id`=p.`id` where ti.`transaksi_id`=$p";

       $model = $connection->createCommand($query);
       $data = $model->queryAll();

       return $data;

    }
	
	 public static function rekap($p,$d=''){
        
        $connection = \Yii::$app->db;
        $query="    SELECT                     
                    sum(ti.`jumlah`) as jumlah,
                    sum(ti.`subtotal`) as subtotal
                    FROM 
                    transaksi_item ti  where ti.`transaksi_id`=$p
					order by ti.`transaksi_id` ";

       $model = $connection->createCommand($query);
       $data = $model->queryAll();
		$ret = empty($d) ? $data[0]['jumlah'] : $data[0]['subtotal']; 
       return $ret;

    }
	public static function uangIndo($angka){

        $ret = !empty($angka) ? "Rp ". number_format( $angka , 2 , ',' , '.' ) : 0;

         return $ret;
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
	
	public static function laporan(){
	$connection = \Yii::$app->db;
        $query="    SELECT 
                    ti.`id`,
                    ti.`transaksi_id`,
					left(t.tanggal,7) as bulan,
                    p.`nama`,
                    ti.`diskon`,
					((ti.`diskon`/100)* ti.`subtotal`) as pot_diskon,
                    sum(ti.`jumlah`) as jumlah,
                    sum(ti.`jumlah`*(ti.`subtotal`-COALESCE(((ti.`diskon`/100)* ti.`subtotal`),0))) as subtotal
                    FROM 
                    transaksi_item ti left JOIN produk p ON ti.`produk_id`=p.`id`
					JOIN transaksi t on t.id=ti.transaksi_id
					GROUP by left(t.tanggal,7) # ti.transaksi_id
					order by ti.transaksi_id";
		$model = $connection->createCommand($query);
		$data = $model->queryAll();

		return $data;
			
	
	}
	
    public function KodePelanggan(){
        $listData=ArrayHelper::map(Pelanggan::find()->all(),'id_pelanggan','nama');
        return $listData;
    }
        public function Pegawai(){
        $listData=ArrayHelper::map(Pegawai::find()->where(['pegawai_type_id'=>2])->all(),'id','nama');
        return $listData;
    }

   public function Produk(){
        $listData=ArrayHelper::map(Produk::find()->all(),'id','nama');
        return $listData;
    }
}
