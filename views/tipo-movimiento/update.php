<?php

use yii\helpers\Html;

/** @var yii\web\View $this */
/** @var app\models\TipoMovimiento $model */

$this->title = 'Update Tipo Movimiento: ' . $model->id_tipo_movimiento;
$this->params['breadcrumbs'][] = ['label' => 'Tipo Movimientos', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id_tipo_movimiento, 'url' => ['view', 'id_tipo_movimiento' => $model->id_tipo_movimiento]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="tipo-movimiento-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
