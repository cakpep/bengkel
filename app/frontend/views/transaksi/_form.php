<?php

use yii\helpers\Html;
use yii\bootstrap\ActiveForm;
use yii\jui\DatePicker;

?>

<div class="transaksi-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'id')->textInput() ?>
	<?=  $form->field($model, 'id_pelanggan')->dropDownList(
									$model->KodePelanggan(), 
									['prompt'=>'Select...']); ?>
									
	<?= $form->field($model, 'tanggal')->widget(DatePicker::classname(), [
								'language' => 'en',
								//'dateFormat' => 'yyyy-MM-dd',
							]) ?>
							
	<?=  $form->field($model, 'id_teknisi')->dropDownList(
									$model->Pegawai(), 
									['prompt'=>'Select...']); ?>
									

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
