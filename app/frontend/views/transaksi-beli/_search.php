<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\TransaksiBeliSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="transaksi-beli-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'id_beli') ?>

    <?= $form->field($model, 'tgl_beli') ?>

    <?= $form->field($model, 'id_supplier') ?>

    <?= $form->field($model, 'id_barang') ?>

    <?= $form->field($model, 'jumlah_beli') ?>

    <?php // echo $form->field($model, 'harga_beli') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
