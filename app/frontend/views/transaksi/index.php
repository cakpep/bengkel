<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\TransaksiSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Transaksi';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="transaksi-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Tambah Transaksi', ['input-transaksi'], ['class' => 'btn btn-success']) ?>
		<?= Html::a('Laporan', ['laporan'], ['class' => 'btn btn-success']) ?>
    </p>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id',
            [
                'attribute' => 'tanggal',
                'format'=>'raw',
                'value' => function ($data){
                    $group = $data->tanggal;
                    return  date('d M Y',strtotime($group));
                }
            ],
            [
                'attribute' => 'id_pelanggan',
                'format'=>'raw',
                'filter'=>$searchModel->KodePelanggan(),
                'value' => function ($data){
                    $group = $data->idPelanggan;
                    return  !empty($group) ? $group->nama :'-';
                }
            ],
            [
                'attribute' => 'id_teknisi',
                'format'=>'raw',
                'filter'=>$searchModel->Pegawai(),
                'value' => function ($data){
                    $group = $data->idTeknisi;
                    return  !empty($group) ? $group->nama :'-';
                }
            ],
			[
                'attribute' => 'id_teknisi',
                'format'=>'raw',
				'header'=>'Jumlah',
                'filter'=>'',
                'value' => function ($data){
                    $group = $data->rekap($data->id);
                    return  !empty($group) ? $group :0;
                }
            ],
			[
                'attribute' => 'id_teknisi',
                'format'=>'raw',
				'header'=>'Subtotal',
                'filter'=>'',
                'value' => function ($data){
                    $group = $data->rekap($data->id,2);
                    return  !empty($group) ? $data->uangIndo($group) :0;
                }
            ],
			[
                'attribute' => 'id_teknisi',
                'format'=>'raw',
				'header'=>'Total',
                'filter'=>'',
                'value' => function ($data){
                    $group = $data->rekap($data->id)*$data->rekap($data->id,2);
                    return  !empty($group) ? $data->uangIndo($group) :0;
                }
            ],
			
			
            

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
	<p style="float:right;">
		<?= Html::a('Cetak', ['export'], ['class' => 'btn btn-success']) ?>
	</p>
</div>
