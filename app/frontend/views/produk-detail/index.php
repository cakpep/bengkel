<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\ProdukDetailSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Produk Details';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="produk-detail-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Create Produk Detail', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id',
            'id_produk',
            'harga_beli',
            'stok',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>

</div>
