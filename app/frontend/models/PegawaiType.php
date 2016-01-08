<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "pegawai_type".
 *
 * @property integer $id
 * @property string $nama
 *
 * @property Pegawai[] $pegawais
 */
class PegawaiType extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'pegawai_type';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['nama'], 'required'],
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
            'nama' => 'Nama',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getPegawais()
    {
        return $this->hasMany(Pegawai::className(), ['pegawai_type_id' => 'id']);
    }
}
