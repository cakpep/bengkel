<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\TipeKendaraan */

$this->title = 'Update Tipe Kendaraan: ' . ' ' . $model->id_tipe;
$this->params['breadcrumbs'][] = ['label' => 'Tipe Kendaraans', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id_tipe, 'url' => ['view', 'id' => $model->id_tipe]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="tipe-kendaraan-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
