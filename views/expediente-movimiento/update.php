<?php

use yii\helpers\Html;

/** @var yii\web\View $this */
/** @var app\models\ExpedienteMovimiento $model */

$this->title = 'Update Expediente Movimiento: ' . $model->id_expediente_movimiento;
$this->params['breadcrumbs'][] = ['label' => 'Expediente Movimientos', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id_expediente_movimiento, 'url' => ['view', 'id_expediente_movimiento' => $model->id_expediente_movimiento]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="expediente-movimiento-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
