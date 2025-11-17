<?php

namespace app\models;

class EMDigesto extends EM implements EMInterface
{
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
        return $this->em->para_digesto;
    }

    public function ejecutarAccion(): string
    {
        return ("Digesto");
    }

    public function getTipoMovimiento(): array
    {
        return [];
    }
}