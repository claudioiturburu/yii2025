<?php
//http://localhost:8183/index.php?r=expediente-movimiento

namespace app\models;

class EM
{

    private array $_data = [
        'Notificacion' => EMNotificacion::class,
        'Protocolo' => EMProtocolo::class,
        'Digesto' => EMDigesto::class,
        'InscripcionProveedor' => EMInscripcionProveedor::class,
        'SuspencionProveedor' => EMSuspencionProveedor::class,
    ];

    protected ExpedienteMovimiento $em;

    public function __construct(ExpedienteMovimiento $em)
    {
        $this->em = $em;
    }

    /**
     * Método factory para crear instancias de clases EM*
     * Este es el único punto autorizado para instanciar clases como EMNotificacion
     */
    protected function crearInstancia($clase)
    {
        $reflection = new \ReflectionClass($clase);
        $constructor = $reflection->getConstructor();
        
        if ($constructor) {
            $constructor->setAccessible(true);
            $instancia = $reflection->newInstanceWithoutConstructor();
            $constructor->invoke($instancia, $this->em);
            return $instancia;
        }
        
        return new $clase($this->em);
    }

    /**
     * Según las características del ExpedienteMovimiento, ejecuta las acciones correspondientes
     */
    public function publicar()
    {
        $transaction = \Yii::$app->db->beginTransaction();
        try {
            $respuesta = [];
            foreach ($this->_data as $clase) {
                $instancia = $this->crearInstancia($clase);
                if ($instancia->cumpleCondiciones()) {
                    $respuesta[] = '- ' . $instancia->ejecutarAccion();
                }
            }
            $respuesta[] = '- Todas.';
            $transaction->commit();
            return implode("<br>", $respuesta);
        } catch (\Exception $e) {
            $transaction->rollBack();
            throw $e;
        }
    }

}