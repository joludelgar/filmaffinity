<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "usuarios".
 *
 * @property integer $id
 * @property string $nombre
 * @property string $email
 * @property string $password
 * @property string $token
 * @property string $created_at
 */
class Usuario extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'usuarios';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['nombre', 'email', 'password'], 'required'],
            [['created_at'], 'safe'],
            [['nombre'], 'string', 'max' => 15],
            [['email', 'password'], 'string', 'max' => 60],
            [['token'], 'string', 'max' => 32],
            [['email'], 'unique'],
            [['nombre'], 'unique'],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'nombre' => 'Nombre',
            'email' => 'Email',
            'password' => 'Password',
            'token' => 'Token',
            'created_at' => 'Created At',
        ];
    }
}
