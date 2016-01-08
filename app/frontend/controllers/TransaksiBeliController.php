<?php

namespace frontend\controllers;

use Yii;
use app\models\TransaksiBeli;
use app\models\TransaksiBeliSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * TransaksiBeliController implements the CRUD actions for TransaksiBeli model.
 */
class TransaksiBeliController extends Controller
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
     * Lists all TransaksiBeli models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new TransaksiBeliSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single TransaksiBeli model.
     * @param string $id
     * @return mixed
     */
    public function actionView($id)
    {
        return $this->render('view', [
            'model' => $this->findModel($id),
        ]);
    }

    /**
     * Creates a new TransaksiBeli model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new TransaksiBeli();

        if ($model->load(Yii::$app->request->post())) {		
			$model->tgl_beli = date('Y-m-d',strtotime($_POST['TransaksiBeli']['tgl_beli']));
			$model->id_beli=$model->nomor();
			if($model->save()){
				return $this->redirect(['view', 'id' => $model->id_beli]);
			}
            
        } else {
            return $this->render('create', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Updates an existing TransaksiBeli model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param string $id
     * @return mixed
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);

		$model->tgl_beli = date('d-M-Y',strtotime($model->tgl_beli));
        if ($model->load(Yii::$app->request->post())) {		
			$model->tgl_beli = date('Y-m-d',strtotime($_POST['TransaksiBeli']['tgl_beli']));			
			if($model->save()){
				return $this->redirect(['view', 'id' => $model->id_beli]);
			}
            
        } else {
            return $this->render('create', [
                'model' => $model,
            ]);
        }
    }
	
	public function actionLaporan()
    {
        $model=new TransaksiBeli();        

        return $this->render('laporan',[
                            'model'=>$model,
                        ]);  
        
    }


    /**
     * Deletes an existing TransaksiBeli model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param string $id
     * @return mixed
     */
    public function actionDelete($id)
    {
        $this->findModel($id)->delete();

        return $this->redirect(['index']);
    }

    /**
     * Finds the TransaksiBeli model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param string $id
     * @return TransaksiBeli the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = TransaksiBeli::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
}
