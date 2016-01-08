<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use dosamigos\datepicker\DatePicker;

?>

<div class="transaksi-beli-form">

    <?php $form = ActiveForm::begin(); ?>

    
	
	<?= $form->field($model, 'tgl_beli')->widget(
                        DatePicker::className(), [
                            'clientOptions' => [
                                'autoclose' => true,
                                'format' => 'dd-M-yyyy'
                            ]
                    ])->label('Tanggal Transaksi'); ?> 

	<?=  $form->field($model, 'id_supplier')->dropDownList(
                                                $model->supplier(), 
                                                ['prompt'=>'Select...'])->label('Nama Supplier'); ?>

	<?=  $form->field($model, 'id_barang')->dropDownList(
                                                $model->barang(), 
                                                ['prompt'=>'Select...'])->label('Nama Barang'); ?>												

    <?= $form->field($model, 'jumlah_beli')->textInput() ?>

    <?= $form->field($model, 'harga_beli')->textInput() ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
