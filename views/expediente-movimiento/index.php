<?php

use app\models\EM;
use app\models\ExpedienteMovimiento;
use yii\helpers\Html;
use yii\helpers\Url;
use yii\grid\ActionColumn;
use yii\grid\GridView;
use yii\widgets\Pjax;
/** @var yii\web\View $this */
/** @var app\models\ExpedienteMovimientoSearch $searchModel */
/** @var yii\data\ActiveDataProvider $dataProvider */

$this->title = 'Expediente Movimientos';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="expediente-movimiento-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Create Expediente Movimiento', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?php Pjax::begin(); ?>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            // 'id_expediente_movimiento',
            'texto:ntext',
            [
                'attribute' => 'id_tipo_movimiento',
                'value' => function ($model) {
                    return $model->tipoMovimiento->descripcion;
                },
            ],
            'para_digesto:boolean',
            [
                'attribute' => 'json_data',
                'format' => 'raw',
                'value' => function ($model) {
                    return is_array($model->json_data) || is_object($model->json_data) 
                        ? '<pre>' . Html::encode(json_encode($model->json_data, JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE)) . '</pre>'
                        : Html::encode($model->json_data);
                }
            ],
            [
                'attribute' => 'callbackPublicar',
                'format' => 'raw',
                'value' => function ($model) {
                    return $model->callbackPublicar();
                }
            ],
            [
                'class' => ActionColumn::class,
                'urlCreator' => function ($action, ExpedienteMovimiento $model, $key, $index, $column) {
                    return Url::toRoute([$action, 'id_expediente_movimiento' => $model->id_expediente_movimiento]);
                 }
            ],
        ],
    ]); ?>

    <?php Pjax::end(); ?>

</div>
