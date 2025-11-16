<?php

namespace app\models;

class EMInscripcionProveedor extends EM implements EMInterface
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
        return $this->em->json_data['InscripcionProveedor'] ?? false;
    }

    public function ejecutarAccion()
    {
        return ("Inscripción Proveedor");
    }
}