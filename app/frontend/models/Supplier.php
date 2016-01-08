<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "supplier".
 *
 * @property integer $id_supplier
 * @property string $nama
 * @property string $no_telp
 * @property string $alamat
 *
 * @property TransaksiBeli[] $transaksiBelis
 */
class Supplier extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'supplier';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['nama', 'no_telp', 'alamat'], 'required'],
            [['alamat'], 'string'],
            [['nama'], 'string', 'max' => 25],
            [['no_telp'], 'string', 'max' => 12]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id_supplier' => 'Id Supplier',
            'nama' => 'Nama',
            'no_telp' => 'No Telp',
            'alamat' => 'Alamat',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getTransaksiBelis()
    {
        return $this->hasMany(TransaksiBeli::className(), ['id_supplier' => 'id_supplier']);
    }
}
