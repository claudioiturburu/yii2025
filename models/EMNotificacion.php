<?php

namespace app\models;

class EMNotificacion extends EM implements EMInterface
{
    const TIPOS_MOVIMIENTO = [
        TipoMovimiento::TIPO_NOTIFICACION,
    ];

    /**
     * Constructor protegido para evitar instanciación directa.
     * Solo puede ser instanciado desde la clase EM.
     */
    protected function __construct(ExpedienteMovimiento $em)
    {
        parent::__construct($em);
    }

    public function cumpleCondiciones(): bool
    {
        return true;
    }

    public function ejecutarAccion(): string
    {
        return ("Notificación");
    }

    public function getTipoMovimiento(): array
    {
        return self::TIPOS_MOVIMIENTO;
    }
}