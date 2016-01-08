<?php
use yii\helpers\Html;
use yii\widgets\ActiveForm;
use wbraganca\dynamicform\DynamicFormWidget;
use dosamigos\datepicker\DatePicker;

?>
 
<div class="customer-form">
    <div class="panel panel-primary">
        <div class="panel-heading"><h4><i class="glyphicon glyphicon-shopping-cart"></i> Input Transaksi</h4></div>
        <div class="panel-body">
            <?php $form = ActiveForm::begin(['id' => 'dynamic-form']); ?>
            <div class="row">
                <div class="col-sm-6">
                    <?php // $form->field($modelTransaksi, 'kode_transaksi')->textInput()->label('No Faktur') ?>
                </div>
                <div class="col-sm-6">

                    <?= $form->field($modelTransaksi, 'tanggal')->widget(
                        DatePicker::className(), [
                            'clientOptions' => [
                                'autoclose' => true,
                                'format' => 'dd-M-yyyy'
                            ]
                    ])->label('Tanggal Transaksi'); ?>      
                </div>
            </div>
    
            <div class="row">
                <div class="col-sm-6">                                
                    <?=  $form->field($modelTransaksi, 'id_pelanggan')->dropDownList(
                                                $modelTransaksi->KodePelanggan(), 
                                                ['prompt'=>'Select...'])->label('Nama Pelanggan'); ?>        
                </div>
                <div class="col-sm-6">                        
                    <?=  $form->field($modelTransaksi, 'id_teknisi')->dropDownList(
                                                $modelTransaksi->Pegawai(), 
                                                ['prompt'=>'Select...'])->label('Nama Teknisi'); ?>
                </div>
            </div>


             <?php DynamicFormWidget::begin([
                'widgetContainer' => 'dynamicform_wrapper', // required: only alphanumeric characters plus "_" [A-Za-z0-9_]
                'widgetBody' => '.container-items', // required: css class selector
                'widgetItem' => '.item', // required: css class
                'limit' => 25, // the maximum times, an element can be cloned (default 999)
                'min' => 1, // 0 or 1 (default 1)
                'insertButton' => '.add-item', // css class
                'deleteButton' => '.remove-item', // css class
                'model' => $modelsTransaksiItem[0],
                'formId' => 'dynamic-form',
                'formFields' => [
                    'id',
                    'transaksi_id',
                    'produk_id',
                    'jumlah',
                    'diskon',
                    'subtotal',
                ],
            ]); ?>

            <div class="container-items"><!-- widgetContainer -->
            <?php foreach ($modelsTransaksiItem as $i => $modelTransaksiItem): ?>
                <div class="item panel panel-default"><!-- widgetBody -->
                    <div class="panel-heading">
                        <h3 class="panel-title pull-left">Item</h3>
                        <div class="pull-right">
                            <button type="button" class="add-item btn btn-success btn-xs"><i class="glyphicon glyphicon-plus"></i></button>
                            <button type="button" class="remove-item btn btn-danger btn-xs"><i class="glyphicon glyphicon-minus"></i></button>
                        </div>
                        <div class="clearfix"></div>
                    </div>
                    <div class="panel-body">
                        <?php
                            // necessary for update action.
                            if (! $modelTransaksiItem->isNewRecord) {
                                echo Html::activeHiddenInput($modelTransaksiItem, "[{$i}]id");
                            }
                        ?>
                        
                        <div class="row">
                            <div class="col-sm-4">
                                <?= $form->field($modelTransaksiItem, "[{$i}]produk_id")->dropDownList(
                                                $modelTransaksiItem->Produk(), 
                                                ['prompt'=>'Pilih Produk...'])->label('Nama Produk'); ?>
                            </div>
                            <div class="col-sm-4">
                                <?= $form->field($modelTransaksiItem, "[{$i}]jumlah")->textInput(['maxlength' => true]) ?>
                            </div>
                            <div class="col-sm-4">
                                <?= $form->field($modelTransaksiItem, "[{$i}]diskon")->textInput(['maxlength' => true]) ?>
                            </div>
							<!--
                            <div class="col-sm-3">
                                <?php //$form->field($modelTransaksiItem, "[{$i}]subtotal")->textInput(['maxlength' => true]) ?>
                            </div>
							-->
                        </div><!-- .row -->                        
                    </div>
                </div>
            <?php endforeach; ?>
            </div>
            <?php DynamicFormWidget::end(); ?>
        </div>
    </div>

    <div class="form-group">
        <?= Html::submitButton($modelTransaksiItem->isNewRecord ? 'Simpan Transaksi' : 'Update', ['class' => 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>