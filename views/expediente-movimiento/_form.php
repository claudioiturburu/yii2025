<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/** @var yii\web\View $this */
/** @var app\models\ExpedienteMovimiento $model */
/** @var yii\widgets\ActiveForm $form */
?>

<div class="expediente-movimiento-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'id_expediente_movimiento')->textInput() ?>

    <?= $form->field($model, 'texto')->textarea(['rows' => 6]) ?>

    <?= $form->field($model, 'id_tipo_movimiento')->textInput() ?>

    <?= $form->field($model, 'para_digesto')->checkbox() ?>

    <?= $form->field($model, 'json_data')->textInput() ?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
