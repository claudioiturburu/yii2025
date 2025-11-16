<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/** @var yii\web\View $this */
/** @var app\models\ExpedienteMovimiento $model */

$this->title = $model->id_expediente_movimiento;
$this->params['breadcrumbs'][] = ['label' => 'Expediente Movimientos', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>
<div class="expediente-movimiento-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Update', ['update', 'id_expediente_movimiento' => $model->id_expediente_movimiento], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Delete', ['delete', 'id_expediente_movimiento' => $model->id_expediente_movimiento], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'Are you sure you want to delete this item?',
                'method' => 'post',
            ],
        ]) ?>
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'id_expediente_movimiento',
            'texto:ntext',
            'id_tipo_movimiento',
            'para_digesto:boolean',
            'json_data',
        ],
    ]) ?>

</div>
