<?php

namespace app\models;

class EMSuspencionProveedor extends EM implements EMInterface
{

    const TIPOS_MOVIMIENTO = [
        TipoMovimiento::TIPO_DISPOSICION_AG,
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
        return !empty($this->em->json_data['SuspencionProveedor']);
    }

    public function ejecutarAccion(): string
    {
        return ("Suspención Proveedor");
    }

    public function getTipoMovimiento(): array
    {
        return self::TIPOS_MOVIMIENTO;
    }
}