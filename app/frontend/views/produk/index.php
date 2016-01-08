<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\ProdukSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Produk';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="produk-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Tambah Data Produk', ['create'], ['class' => 'btn btn-success']) ?>
		 <?= Html::a('Tambah Type Produk', ['/produk-type'], ['class' => 'btn btn-success']) ?>
    </p>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id',
            [
                'attribute' => 'type_id',
                'format'=>'raw',
                'filter'=>$searchModel->tipeproduk(), 
                'value' => function ($data){
                    $group = $data->type;
                    return  !empty($group) ? $group->nama :'-';
                }
            ],
            'nama',
            'harga',
            'stok',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
	<p style="float:right;">
		<?= Html::a('Cetak', ['export'], ['class' => 'btn btn-success']) ?>
	</p>
</div>
