<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "tipe_kendaraan".
 *
 * @property integer $id_tipe
 * @property string $nama_tipe
 */
class TipeKendaraan extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'tipe_kendaraan';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['nama_tipe'], 'required'],
            [['nama_tipe'], 'string', 'max' => 50]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id_tipe' => 'Id Tipe',
            'nama_tipe' => 'Nama Tipe',
        ];
    }
	
	public function getTransaksis()
    {
        return $this->hasMany(Pelanggan::className(), ['id_tipe' => 'tipe_kendaraan']);
    }
	
}
