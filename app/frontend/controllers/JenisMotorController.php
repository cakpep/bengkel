<?php

namespace app\controllers;

use Yii;
use app\models\JenisMotor;
use app\models\JenisMotorSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * JenisMotorController implements the CRUD actions for JenisMotor model.
 */
class JenisMotorController extends Controller
{
    public function behaviors()
    {
        return [
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'delete' => ['post'],
                ],
            ],
        ];
    }

    /**
     * Lists all JenisMotor models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new JenisMotorSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single JenisMotor model.
     * @param integer $id_jenis
     * @param string $nama_jenis
     * @return mixed
     */
    public function actionView($id_jenis, $nama_jenis)
    {
        return $this->render('view', [
            'model' => $this->findModel($id_jenis, $nama_jenis),
        ]);
    }

    /**
     * Creates a new JenisMotor model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new JenisMotor();

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id_jenis' => $model->id_jenis, 'nama_jenis' => $model->nama_jenis]);
        } else {
            return $this->render('create', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Updates an existing JenisMotor model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id_jenis
     * @param string $nama_jenis
     * @return mixed
     */
    public function actionUpdate($id_jenis, $nama_jenis)
    {
        $model = $this->findModel($id_jenis, $nama_jenis);

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id_jenis' => $model->id_jenis, 'nama_jenis' => $model->nama_jenis]);
        } else {
            return $this->render('update', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Deletes an existing JenisMotor model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id_jenis
     * @param string $nama_jenis
     * @return mixed
     */
    public function actionDelete($id_jenis, $nama_jenis)
    {
        $this->findModel($id_jenis, $nama_jenis)->delete();

        return $this->redirect(['index']);
    }

    /**
     * Finds the JenisMotor model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id_jenis
     * @param string $nama_jenis
     * @return JenisMotor the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id_jenis, $nama_jenis)
    {
        if (($model = JenisMotor::findOne(['id_jenis' => $id_jenis, 'nama_jenis' => $nama_jenis])) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
}
