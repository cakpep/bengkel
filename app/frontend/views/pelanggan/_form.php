<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
//print_r($model->nomor());
/* @var $this yii\web\View */
/* @var $model app\models\Pelanggan */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="pelanggan-form">

    <?php $form = ActiveForm::begin(); ?>
	<div class="row">
		<div class="col-md-2">
			<?= $form->field($model, 'nama')->textInput(['maxlength' => true]) ?>
		</div>
		
		<div class="col-md-2">
			<!-- ?= $form->field($model, 'id_pelanggan')->textInput() ?> -->
		</div>
	</div>
	
    <div class="row">
		<div class="col-md-8">
			<?= $form->field($model, 'alamat')->textInput(['maxlength' => true]) ?>
		</div>
	
		<div class="col-md-5">
		<?= $form->field($model, 'telp')->textInput(['maxlength' => true]) ?>
	</div>
	
		<div class="col-md-3">
			<?=  $form->field($model, 'tipe_kendaraan')->dropDownList(
									$model->tipeKendaraan(), 
									['prompt'=>'Select...']); ?>
	</div>
	
		<div class="col-md-5">
			<?= $form->field($model, 'no_polisi')->textInput(['maxlength' => true]) ?>
			
		<div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Tambah' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>
</div>
</div>
    <?php ActiveForm::end(); ?>

</div>
