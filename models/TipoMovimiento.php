<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "tipo_movimiento".
 *
 * @property string $id_tipo_movimiento
 * @property string $descripcion
 * @property bool $protocoliza
 *
 * @property ExpedienteMovimiento[] $expedienteMovimientos
 */
class TipoMovimiento extends \yii\db\ActiveRecord
{

    const TIPO_NOTIFICACION = '02c0c5b3-fe2f-4804-8b5a-d66d43ac1131';
    const TIPO_DISPOSICION_AG = '294f7381-11da-4e71-b11d-bed341a70672';
    const TIPO_RESOLUCION = '5daa44c2-2e36-4c1d-8eb4-d77beefa8a66';
    const TIPO_MOVIMIENTO_SIMPLE = '441cbad3-7a8f-40e6-a003-1cb0e957bd82';


    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'tipo_movimiento';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['protocoliza'], 'default', 'value' => 0],
            [['id_tipo_movimiento', 'descripcion'], 'required'],
            [['id_tipo_movimiento'], 'string'],
            [['protocoliza'], 'boolean'],
            [['descripcion'], 'string', 'max' => 255],
            [['id_tipo_movimiento'], 'unique'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id_tipo_movimiento' => 'Id Tipo Movimiento',
            'descripcion' => 'Descripcion',
            'protocoliza' => 'Protocoliza',
        ];
    }

    /**
     * Gets query for [[ExpedienteMovimientos]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getExpedienteMovimientos()
    {
        return $this->hasMany(ExpedienteMovimiento::class, ['id_tipo_movimiento' => 'id_tipo_movimiento']);
    }

}
