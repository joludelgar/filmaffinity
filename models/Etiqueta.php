<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "etiquetas".
 *
 * @property integer $id
 * @property string $nombre
 *
 * @property EtiquetasPeliculas[] $etiquetasPeliculas
 */
class Etiqueta extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'etiquetas';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['nombre'], 'required'],
            [['nombre'], 'string', 'max' => 80],
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
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getEtiquetasPeliculas()
    {
        return $this->hasMany(EtiquetasPeliculas::className(), ['etiqueta_id' => 'id'])->inverseOf('etiqueta');
    }
}
