<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\TipeKendaraan */

$this->title = 'Tambah Tipe Kendaraan';
$this->params['breadcrumbs'][] = ['label' => 'Tipe Kendaraan', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="tipe-kendaraan-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
