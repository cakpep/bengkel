<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "teknisi".
 *
 * @property integer $id
 * @property string $nama
 * @property string $alamat
 * @property integer $no_telp
 *
 * @property Transaksi[] $transaksis
 */
class Teknisi extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'teknisi';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id'], 'required'],
            [['id', 'no_telp'], 'integer'],
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
            'nama' => 'Nama',
            'alamat' => 'Alamat',
            'no_telp' => 'No Telp',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getTransaksis()
    {
        return $this->hasMany(Transaksi::className(), ['id_teknisi' => 'id']);
    }
}
