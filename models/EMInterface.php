<?php

namespace app\models;

interface EMInterface
{
    public function getTipoMovimiento(): array;
    public function cumpleCondiciones(): bool;
    public function ejecutarAccion(): string;
}