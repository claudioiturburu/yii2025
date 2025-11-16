<?php

use app\models\TipoMovimiento;
use yii\helpers\Html;
use yii\helpers\Url;
use yii\grid\ActionColumn;
use yii\grid\GridView;
use yii\widgets\Pjax;
/** @var yii\web\View $this */
/** @var app\models\TipoMovimientoSearch $searchModel */
/** @var yii\data\ActiveDataProvider $dataProvider */

$this->title = 'Tipo Movimientos';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="tipo-movimiento-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Create Tipo Movimiento', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?php Pjax::begin(); ?>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id_tipo_movimiento',
            'descripcion',
            'protocoliza:boolean',
            [
                'class' => ActionColumn::className(),
                'urlCreator' => function ($action, TipoMovimiento $model, $key, $index, $column) {
                    return Url::toRoute([$action, 'id_tipo_movimiento' => $model->id_tipo_movimiento]);
                 }
            ],
        ],
    ]); ?>

    <?php Pjax::end(); ?>

</div>
