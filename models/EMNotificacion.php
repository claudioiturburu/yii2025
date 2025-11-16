<?php

namespace app\models;

class EMNotificacion extends EM implements EMInterface
{
    /**
     * Constructor protegido para evitar instanciación directa.
     * Solo puede ser instanciado desde la clase EM.
     */
    protected function __construct(ExpedienteMovimiento $em)
    {
        parent::__construct($em);
    }

    public function cumpleCondiciones()
    {
        return $this->em->id_tipo_movimiento === TipoMovimiento::TIPO_NOTIFICACION;
    }

    public function ejecutarAccion()
    {
        return ("Notificación");
    }
}