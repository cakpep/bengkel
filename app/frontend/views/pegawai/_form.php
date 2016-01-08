<?php
use yii\helpers\Html;
use yii\widgets\ActiveForm;
?>

<div class="pegawai-form">

    <?php $form = ActiveForm::begin(); ?>
	<div class="row">
	<div class="col-md-8">

	<?=  $form->field($model, 'pegawai_type_id')->dropDownList(
									$model->jenisPegawai(), 
									['prompt'=>'Select...']); ?>

    <?= $form->field($model, 'nama')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'alamat')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'no_telp')->textInput() ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
