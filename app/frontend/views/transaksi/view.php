<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\Transaksi */

$this->title = $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Transaksis', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="transaksi-view">

    <table class="table">
        
		<tr>
            <td >Kode Transaksi <?= @$model->kode_transaksi.'-'.$model->id ?></td>
			<td>Tanggal <?= @$model->tanggal ?></td>
            
        </tr>
        <tr>
            <td>Nama Pelanggan <?= @$model->idPelanggan->nama ?></td>
			<td>Nama Teknisi <?= @$model->idTeknisi->nama     ?></td>            
        </tr>
    </table>    

    <table class="table">
        <?php 
        $totalbayar=0;
        echo "<tr>
                    
                    <td>Nama Barang/Items</td>
                    <td>Jumlah Barang </td>
                    <td>Diskon</td>
                    <td>Subtotal</td>
                </tr>";
            
            foreach ($model->items($model->id) as $key => $value) {
                // print_r($value);
                echo "<tr>
                    
                    
                     <td>". $value["nama"]." </td>
                    <td>". $value['jumlah'] ."</td>
                    <td>". $value['diskon']." </td>
                    <td>". $value['subtotal']."</td>
                </tr>";
                $totalbayar+=$value['subtotal'];
            
            }

            echo "<tr>
                    
                    <td colspan=3>Total Bayar</td>
                    <td>$totalbayar</td>
                </tr>";

        ?>
    </table>


      <p>
        <?= Html::a('Input Lagi', ['input-transaksi'], ['class' => 'btn btn-primary']) ?>
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
