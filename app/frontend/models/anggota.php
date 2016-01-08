<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "Anggota".
 *
 * @property string $id
 * @property string $nama
 * @property string $alamat
 */
class anggota extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'Anggota';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id', 'nama', 'alamat'], 'required'],
            [['alamat'], 'string'],
            [['id'], 'string', 'max' => 13],
            [['nama'], 'string', 'max' => 40]
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
        ];
    }
}
