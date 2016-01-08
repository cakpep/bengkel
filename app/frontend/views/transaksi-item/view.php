<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\TransaksiItem */

$this->title = $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Transaksi Items', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="transaksi-item-view">

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'id',
            'transaksi_id',
            'produk_id',
            'jumlah',
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