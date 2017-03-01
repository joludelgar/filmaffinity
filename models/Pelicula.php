<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "peliculas".
 *
 * @property integer $id
 * @property string $titulo
 * @property string $sinopsis
 * @property string $duracion
 * @property string $anio
 *
 * @property EtiquetasPeliculas[] $etiquetasPeliculas
 */
class Pelicula extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'peliculas';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['titulo', 'sinopsis', 'duracion', 'anio'], 'required'],
            [['sinopsis'], 'string'],
            [['duracion', 'anio'], 'number'],
            [['titulo'], 'string', 'max' => 80],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'titulo' => 'Titulo',
            'sinopsis' => 'Sinopsis',
            'duracion' => 'Duracion',
            'anio' => 'Anio',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getEtiquetasPeliculas()
    {
        return $this->hasMany(EtiquetasPeliculas::className(), ['pelicula_id' => 'id'])->inverseOf('pelicula');
    }
}
