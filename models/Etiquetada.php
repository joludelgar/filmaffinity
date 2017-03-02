<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "etiquetas_peliculas".
 *
 * @property integer $id
 * @property integer $etiqueta_id
 * @property integer $pelicula_id
 *
 * @property Etiquetas $etiqueta
 * @property Peliculas $pelicula
 */
class Etiquetada extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'etiquetas_peliculas';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['etiqueta_id', 'pelicula_id'], 'required'],
            [['etiqueta_id', 'pelicula_id'], 'integer'],
            [['etiqueta_id', 'pelicula_id'], 'unique'],
            [['etiqueta_id'], 'exist', 'skipOnError' => true, 'targetClass' => Etiqueta::className(), 'targetAttribute' => ['etiqueta_id' => 'id']],
            [['pelicula_id'], 'exist', 'skipOnError' => true, 'targetClass' => Pelicula::className(), 'targetAttribute' => ['pelicula_id' => 'id']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'etiqueta_id' => 'Etiqueta ID',
            'pelicula_id' => 'Pelicula ID',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getEtiqueta()
    {
        return $this->hasOne(Etiqueta::className(), ['id' => 'etiqueta_id'])->inverseOf('etiquetadas');
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getPelicula()
    {
        return $this->hasOne(Pelicula::className(), ['id' => 'pelicula_id'])->inverseOf('etiquetadas');
    }
}
