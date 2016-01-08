<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\TransaksiBeli */

$this->title = 'Update Transaksi Beli: ' . ' ' . $model->id_beli;
$this->params['breadcrumbs'][] = ['label' => 'Transaksi Belis', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id_beli, 'url' => ['view', 'id' => $model->id_beli]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="transaksi-beli-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
