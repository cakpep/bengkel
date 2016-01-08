<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\PelangganSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Data Pelanggan';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="pelanggan-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Tambah Data Pelanggan', ['create'], ['class' => 'btn btn-success']) ?>
		<?= Html::a('Tambah Tipe Kendaraan', ['/tipe-kendaraan'], ['class' => 'btn btn-success']) ?>
	</p>
<?php
//print_r($searchModel->tipeKendaraan());
?>
    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id_pelanggan',
            'nama',
            'alamat',
            'telp',
            //'tipe_kendaraan',
			[
                'attribute' => 'tipe_kendaraan',
                'format'=>'raw',
                'filter'=>$searchModel->tipeKendaraan(),
                'value' => function ($data){
                    $group = $data->tipeKendaraan;
					
					//getTipeKendaraan
                    return  !empty($group) ? $group->nama_tipe :'-';
                }
            ],
            'no_polisi',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
	<p style="float:right;">
        <?= Html::a('Cetak', ['export'], ['class' => 'btn btn-success']) ?>
    </p>
</div>
