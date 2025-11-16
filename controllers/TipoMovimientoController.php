<?php

namespace app\controllers;

use app\models\TipoMovimiento;
use app\models\TipoMovimientoSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * TipoMovimientoController implements the CRUD actions for TipoMovimiento model.
 */
class TipoMovimientoController extends Controller
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
     * Lists all TipoMovimiento models.
     *
     * @return string
     */
    public function actionIndex()
    {
        $searchModel = new TipoMovimientoSearch();
        $dataProvider = $searchModel->search($this->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single TipoMovimiento model.
     * @param string $id_tipo_movimiento Id Tipo Movimiento
     * @return string
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionView($id_tipo_movimiento)
    {
        return $this->render('view', [
            'model' => $this->findModel($id_tipo_movimiento),
        ]);
    }

    /**
     * Creates a new TipoMovimiento model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return string|\yii\web\Response
     */
    public function actionCreate()
    {
        $model = new TipoMovimiento();

        if ($this->request->isPost) {
            if ($model->load($this->request->post()) && $model->save()) {
                return $this->redirect(['view', 'id_tipo_movimiento' => $model->id_tipo_movimiento]);
            }
        } else {
            $model->loadDefaultValues();
        }

        return $this->render('create', [
            'model' => $model,
        ]);
    }

    /**
     * Updates an existing TipoMovimiento model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param string $id_tipo_movimiento Id Tipo Movimiento
     * @return string|\yii\web\Response
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($id_tipo_movimiento)
    {
        $model = $this->findModel($id_tipo_movimiento);

        if ($this->request->isPost && $model->load($this->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id_tipo_movimiento' => $model->id_tipo_movimiento]);
        }

        return $this->render('update', [
            'model' => $model,
        ]);
    }

    /**
     * Deletes an existing TipoMovimiento model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param string $id_tipo_movimiento Id Tipo Movimiento
     * @return \yii\web\Response
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionDelete($id_tipo_movimiento)
    {
        $this->findModel($id_tipo_movimiento)->delete();

        return $this->redirect(['index']);
    }

    /**
     * Finds the TipoMovimiento model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param string $id_tipo_movimiento Id Tipo Movimiento
     * @return TipoMovimiento the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id_tipo_movimiento)
    {
        if (($model = TipoMovimiento::findOne(['id_tipo_movimiento' => $id_tipo_movimiento])) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }
}
