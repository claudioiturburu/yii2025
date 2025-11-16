<?php

namespace app\controllers;

use app\models\ExpedienteMovimiento;
use app\models\ExpedienteMovimientoSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * ExpedienteMovimientoController implements the CRUD actions for ExpedienteMovimiento model.
 */
class ExpedienteMovimientoController extends Controller
{
    /**
     * @inheritDoc
     */
    public function behaviors()
    {
        return array_merge(
            parent::behaviors(),
            [
                'verbs' => [
                    'class' => VerbFilter::className(),
                    'actions' => [
                        'delete' => ['POST'],
                    ],
                ],
            ]
        );
    }

    /**
     * Lists all ExpedienteMovimiento models.
     *
     * @return string
     */
    public function actionIndex()
    {
        $searchModel = new ExpedienteMovimientoSearch();
        $dataProvider = $searchModel->search($this->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single ExpedienteMovimiento model.
     * @param string $id_expediente_movimiento Id Expediente Movimiento
     * @return string
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionView($id_expediente_movimiento)
    {
        return $this->render('view', [
            'model' => $this->findModel($id_expediente_movimiento),
        ]);
    }

    /**
     * Creates a new ExpedienteMovimiento model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return string|\yii\web\Response
     */
    public function actionCreate()
    {
        $model = new ExpedienteMovimiento();

        if ($this->request->isPost) {
            if ($model->load($this->request->post()) && $model->save()) {
                return $this->redirect(['view', 'id_expediente_movimiento' => $model->id_expediente_movimiento]);
            }
        } else {
            $model->loadDefaultValues();
        }

        return $this->render('create', [
            'model' => $model,
        ]);
    }

    /**
     * Updates an existing ExpedienteMovimiento model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param string $id_expediente_movimiento Id Expediente Movimiento
     * @return string|\yii\web\Response
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($id_expediente_movimiento)
    {
        $model = $this->findModel($id_expediente_movimiento);

        if ($this->request->isPost && $model->load($this->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id_expediente_movimiento' => $model->id_expediente_movimiento]);
        }

        return $this->render('update', [
            'model' => $model,
        ]);
    }

    /**
     * Deletes an existing ExpedienteMovimiento model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param string $id_expediente_movimiento Id Expediente Movimiento
     * @return \yii\web\Response
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionDelete($id_expediente_movimiento)
    {
        $this->findModel($id_expediente_movimiento)->delete();

        return $this->redirect(['index']);
    }

    /**
     * Finds the ExpedienteMovimiento model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param string $id_expediente_movimiento Id Expediente Movimiento
     * @return ExpedienteMovimiento the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id_expediente_movimiento)
    {
        if (($model = ExpedienteMovimiento::findOne(['id_expediente_movimiento' => $id_expediente_movimiento])) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }
}
