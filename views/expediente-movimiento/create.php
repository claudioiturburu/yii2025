<?php

use yii\helpers\Html;

/** @var yii\web\View $this */
/** @var app\models\ExpedienteMovimiento $model */

$this->title = 'Create Expediente Movimiento';
$this->params['breadcrumbs'][] = ['label' => 'Expediente Movimientos', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="expediente-movimiento-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
