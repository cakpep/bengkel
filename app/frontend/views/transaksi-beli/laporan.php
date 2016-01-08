<?php
use yii\helpers\Html;
use app\models\Data;
$this->title = 'LAPORAN ';
$this->params['breadcrumbs'][] = $this->title;

?>


<h1>Laporan Pembelian Bulanan </h3>
<hr>
<div class="row">
	<table class="table">
		<tr>
			<td><b>No</b></td>			
			<td><b>Bulan</b></td>
			<td align='right'><b>Jumlah</b></td>
			<td align='right'><b>Sub Total</b></td>
		</tr>


	<?php
	$no=1;
	$total=0;
	foreach ($model->laporan() as $key => $value) {    
		echo 
		"<tr>
			<td> $no </td>
			<td align='right'>".$value['bulan']."</td>
			<td align='right'>".$value['jumlah']."</td>
			<td align='right'>".$model->uangIndo($value['subtotal'])."</td>
		</tr>";

		$no++;
		$total=$total+=$value['subtotal'];

	}
		echo 
		"<tr>
			<td colspan=3 align='right'> Total Keuntungan </td>
			<td align='right'><b>".$total."</b></td>
		</tr>";
	?>
	</table>	
</div>
	