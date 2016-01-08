<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\pegawaiSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Pegawai';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="pegawai-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Tambah Data Pegawai', ['create'], ['class' => 'btn btn-success']) ?>
		<?= Html::a('Tambah Tipe Pegawai', ['/pegawai-type'], ['class' => 'btn btn-success']) ?>
    </p>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id',
            
            
            [
                'attribute' => 'pegawai_type_id',
                'format'=>'raw',
                'filter'=>$searchModel->jenisPegawai(), 
                'value' => function ($data){
                    $group = $data->pegawaiType;
                    return  !empty($group) ? $group->nama :'-';
                }
            ],
            'nama',
            'alamat',
            'no_telp',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
	<p style="float:right;">
		<?= Html::a('Cetak', ['export'], ['class' => 'btn btn-success']) ?>
	</p>

</div>
