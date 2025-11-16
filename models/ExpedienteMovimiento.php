<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "expediente_movimiento".
 *
 * @property string $id_expediente_movimiento
 * @property string|null $texto
 * @property string $id_tipo_movimiento
 * @property bool $para_digesto
 * @property string|null $json_data
 *
 * @property TipoMovimiento $tipoMovimiento
 */
class ExpedienteMovimiento extends \yii\db\ActiveRecord
{


    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'expediente_movimiento';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['texto', 'json_data'], 'default', 'value' => null],
            [['para_digesto'], 'default', 'value' => 0],
            [['id_expediente_movimiento', 'id_tipo_movimiento'], 'required'],
            [['id_expediente_movimiento', 'texto', 'id_tipo_movimiento'], 'string'],
            [['para_digesto'], 'boolean'],
            [['json_data'], 'safe'],
            [['id_expediente_movimiento'], 'unique'],
            [['id_tipo_movimiento'], 'exist', 'skipOnError' => true, 'targetClass' => TipoMovimiento::class, 'targetAttribute' => ['id_tipo_movimiento' => 'id_tipo_movimiento']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id_expediente_movimiento' => 'Id Expediente Movimiento',
            'texto' => 'Texto',
            'id_tipo_movimiento' => 'Id Tipo Movimiento',
            'para_digesto' => 'Para Digesto',
            'json_data' => 'Json Data',
        ];
    }

    /**
     * Gets query for [[TipoMovimiento]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getTipoMovimiento()
    {
        return $this->hasOne(TipoMovimiento::class, ['id_tipo_movimiento' => 'id_tipo_movimiento']);
    }

    public function callbackPublicar()
    {
        $em = new EM($this);
        return $em->publicar();
    }

}
