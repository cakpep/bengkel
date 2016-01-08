<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "user".
 *
 * @property integer $id
 * @property integer $level
 * @property string $username
 * @property string $password_hash
 * @property string $auth_key
 * @property string $email
 * @property integer $status
 * @property integer $profil
 * @property integer $created_at
 * @property integer $created_by
 * @property integer $updated_at
 * @property integer $modifiedBy
 * @property string $deleted
 * @property integer $deletedBy
 */
class user extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'user';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['level', 'status', 'profil', 'created_at', 'created_by', 'updated_at', 'modifiedBy', 'deletedBy'], 'integer'],
            [['username', 'password_hash', 'auth_key', 'email'], 'required'],
            [['deleted'], 'safe'],
            [['username'], 'string', 'max' => 25],
            [['password_hash'], 'string', 'max' => 255],
            [['auth_key'], 'string', 'max' => 40],
            [['email'], 'string', 'max' => 30],
            [['username'], 'unique']
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'level' => 'Level',
            'username' => 'Username',
            'password_hash' => 'Password Hash',
            'auth_key' => 'Auth Key',
            'email' => 'Email',
            'status' => 'Status',
            'profil' => 'Profil',
            'created_at' => 'Created At',
            'created_by' => 'Created By',
            'updated_at' => 'Updated At',
            'modifiedBy' => 'Modified By',
            'deleted' => 'Deleted',
            'deletedBy' => 'Deleted By',
        ];
    }
}
