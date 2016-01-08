<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\TransaksiItemSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Transaksi Items';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="transaksi-item-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Create Transaksi Item', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id',
            'transaksi_id',
            'produk_id',
            'jumlah',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>

</div>
