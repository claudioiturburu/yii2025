<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/** @var yii\web\View $this */
/** @var app\models\ExpedienteMovimientoSearch $model */
/** @var yii\widgets\ActiveForm $form */
?>

<div class="expediente-movimiento-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
        'options' => [
            'data-pjax' => 1
        ],
    ]); ?>

    <?= $form->field($model, 'id_expediente_movimiento') ?>

    <?= $form->field($model, 'texto') ?>

    <?= $form->field($model, 'id_tipo_movimiento') ?>

    <?= $form->field($model, 'para_digesto')->checkbox() ?>

    <?= $form->field($model, 'json_data') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-outline-secondary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
