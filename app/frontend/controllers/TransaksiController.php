<?php

namespace frontend\controllers;

use Yii;
use app\models\Transaksi;
use app\models\TransaksiItem;
use app\models\Produk;
use app\models\TransaksiSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\filters\AccessControl;
use app\models\Model;
use yii\web\Response;
use yii\helpers\ArrayHelper;

/**
 * TransaksiController implements the CRUD actions for Transaksi model.
 */
class TransaksiController extends Controller
{
    public function behaviors()
    {
        return [
		'access' => [
                'class' => AccessControl::className(),
                'only' => ['create', 'view', 'index', 'update', 'delete'],
                'rules' => [
                    [
                        'actions' => ['create'],
                        'allow' => true,
                        'roles' => ['@'],
                    ],
                    [
                        'actions' => ['view'],
                        'allow' => true,
                        'roles' => ['@'],
                    ],
					[
                        'actions' => ['index'],
                        'allow' => true,
                        'roles' => ['@'],
                    ],
					[
                        'actions' => ['update'],
                        'allow' => true,
                        'roles' => ['@'],
                    ],
					[
                        'actions' => ['delete'],
                        'allow' => true,
                        'roles' => ['@'],
                    ],
                ],
            ],
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'delete' => ['post'],
                ],
            ],
        ];
    }

    /**
     * Lists all Transaksi models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new TransaksiSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    public function actionExport(){

        $model= Transaksi::find()->all();
        return $this->render('tcpdf',[
                'model'=>$model,
            ]);        
    }

    public function actionView($id)
    {
        return $this->render('view', [
            'model' => $this->findModel($id),
        ]);
    }

    /**
     * Creates a new Transaksi model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionTransaksi()
    {
        $model = new Transaksi();

        if ($model->load(Yii::$app->request->post())) {

            $model->tanggal= date('Y-m-d',strtotime($_POST['Transaksi']['tanggal']));

            if($model->save()){
                return $this->redirect(['view', 'id' => $model->id]);
            }
        } else {
            return $this->render('create', [
                'model' => $model,
            ]);
        }
    }
	
	public function actionLaporan()
    {
        $model=new Transaksi();        

        return $this->render('laporan',[
                            'model'=>$model,
                        ]);  
        
    }

    /**
     * Updates an existing Transaksi model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);

        if ($model->load(Yii::$app->request->post())) {
			$model->tanggal = date('Y-m-d',strtotime($_POST['Transaksi']['tanggal']));
			if($model->save()){
				return $this->redirect(['view', 'id' => $model->id]);
			}
            
        } else {
            return $this->render('update', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Deletes an existing Transaksi model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     */
    public function actionDelete($id)
    {
        $this->findModel($id)->delete();

        return $this->redirect(['index']);
    }


    public function actionInputTransaksi()
    { 
        $modelTransaksi= new Transaksi;
        $modelsTransaksiItem = [new TransaksiItem];
        if ($modelTransaksi->load(Yii::$app->request->post())) {
			$modelTransaksi->kode_transaksi = 'TRNS';
            $modelsTransaksiItem = Model::createMultiple(TransaksiItem::classname());
            Model::loadMultiple($modelsTransaksiItem, Yii::$app->request->post());

            // ajax validation
            if (Yii::$app->request->isAjax) {
                Yii::$app->response->format = Response::FORMAT_JSON;
                return ArrayHelper::merge(
                    ActiveForm::validateMultiple($modelsTransaksiItem),
                    ActiveForm::validate($modelTransaksi)
                );
            }

            // validate all models
            $valid = $modelTransaksi->validate();
            $valid = Model::validateMultiple($modelsTransaksiItem) && $valid;
           
            if ($valid) {
                $transaction = \Yii::$app->db->beginTransaction();
                try {

                    $modelTransaksi->tanggal= date('Y-m-d',strtotime($_POST['Transaksi']['tanggal']));

                    if ($flag = $modelTransaksi->save(false)) {
                        $i=0;
                        foreach ($modelsTransaksiItem as $modelTransaksiItem) {
                            
                            $modelTransaksiItem->transaksi_id = $modelTransaksi->id;
                            $modelTransaksiItem->produk_id = $_POST['TransaksiItem'][$i]['produk_id'];
                            $modelTransaksiItem->subtotal = Produk::findOne($_POST['TransaksiItem'][$i]['produk_id'])->harga*$modelTransaksiItem->jumlah;

                            $i++;

                            if (! ($flag = $modelTransaksiItem->save(false))) {
                                $transaction->rollBack();
                                break;
                            }
                        }
                    }
                    if ($flag) {
                        $transaction->commit();
                        return $this->redirect(['view', 'id' => $modelTransaksi->id]);
                    }
                } catch (Exception $e) {
                    $transaction->rollBack();
                }
            }
        }

        return $this->render('_formD', [
            'modelTransaksi' => $modelTransaksi,
            'modelsTransaksiItem' => (empty($modelsTransaksiItem)) ? [new TransaksiItem] : $modelsTransaksiItem,
        ]);
    }

    public function actionUpdateD($id)
    {
        $modelTransaksi = $this->findModel($id);
        $modelsTransaksiItem = $modelTransaksi->addresses;

        if ($modelTransaksi->load(Yii::$app->request->post())) {

            $oldIDs = ArrayHelper::map($modelsTransaksiItem, 'id', 'id');
            $modelsTransaksiItem = Model::createMultiple(TransaksiItem::classname(), $modelsTransaksiItem);
            Model::loadMultiple($modelsTransaksiItem, Yii::$app->request->post());
            $deletedIDs = array_diff($oldIDs, array_filter(ArrayHelper::map($modelsTransaksiItem, 'id', 'id')));

            // ajax validation
            if (Yii::$app->request->isAjax) {
                Yii::$app->response->format = Response::FORMAT_JSON;
                return ArrayHelper::merge(
                    ActiveForm::validateMultiple($modelsTransaksiItem),
                    ActiveForm::validate($modelTransaksi)
                );
            }

            // validate all models
            $valid = $modelTransaksi->validate();
            $valid = Model::validateMultiple($modelsTransaksiItem) && $valid;

            if ($valid) {
                $transaction = \Yii::$app->db->beginTransaction();
                try {
                    if ($flag = $modelTransaksi->save(false)) {
                        if (! empty($deletedIDs)) {
                            TransaksiItem::deleteAll(['id' => $deletedIDs]);
                        }
                        foreach ($modelsTransaksiItem as $modelAddress) {
                            $modelAddress->customer_id = $modelTransaksi->id;
                            if (! ($flag = $modelAddress->save(false))) {
                                $transaction->rollBack();
                                break;
                            }
                        }
                    }
                    if ($flag) {
                        $transaction->commit();
                        return $this->redirect(['view', 'id' => $modelTransaksi->id]);
                    }
                } catch (Exception $e) {
                    $transaction->rollBack();
                }
            }
        }

        return $this->render('_formD', [
            'modelTransaksi' => $modelTransaksi,
            'modelsTransaksiItem' => (empty($modelsTransaksiItem)) ? [new Address] : $modelsTransaksiItem
        ]);
    }

    protected function findModel($id)
    {
        if (($model = Transaksi::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
}
