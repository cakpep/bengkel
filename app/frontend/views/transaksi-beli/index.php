<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\TransaksiBeliSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Transaksi Beli';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="transaksi-beli-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Tambah Transaksi Beli', ['create'], ['class' => 'btn btn-success']) ?>
		        <?= Html::a('Laporan', ['laporan'], ['class' => 'btn btn-success']) ?>
    </p>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id_beli',
            
			[
                'attribute' => 'tgl_beli',
                'format'=>'raw',
                'value' => function ($data){
                    $group = $data->tgl_beli;
                    return  date('d M Y',strtotime($group));
                }
            ],
            
			[
                'attribute' => 'id_supplier',
                'format'=>'raw',
                'filter'=>$searchModel->supplier(),
                'value' => function ($data){
                    $group = $data->idSupplier;
                    return  !empty($group) ? $group->nama :'-';
                }
            ],
            
			[
                'attribute' => 'id_barang',
                'format'=>'raw',
                'filter'=>$searchModel->barang(),
                'value' => function ($data){
                    $group = $data->idBarang;
                    return  !empty($group) ? $group->nama :'-';
                }
            ],
            'jumlah_beli',
            
			[
                'attribute' => 'harga_beli',
                'format'=>'raw',
                'filter'=>'',
                'value' => function ($data){
                    $group = $data->harga_beli;
                    return  !empty($group) ? $data->uangIndo($group) :'-';
                }
            ],
			[
                'attribute' => 'id_barang',
                'format'=>'raw',
				'header'=>'Sub Total',
                'filter'=>'',
                'value' => function ($data){
				$total = 0;
                    $jml = !empty($data->jumlah_beli) ? $data->jumlah_beli : 0;
					$harga = !empty($data->harga_beli) ? $data->harga_beli : 0;
					$total = $jml * $harga;
                    return  $data->uangIndo($total);
                }
            ],

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>

</div>
