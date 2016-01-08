<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\ProdukDetail */

$this->title = $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Produk Details', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="produk-detail-view">

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'id',
            'id_produk',
            'harga_beli',
            'stok',
        ],
    ]) ?>

     <p>
        <?= Html::a('Update', ['update', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Delete', ['delete', 'id' => $model->id], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'Are you sure you want to delete this item?',
                'method' => 'post',
            ],
        ]) ?>
    </p>

</div>
