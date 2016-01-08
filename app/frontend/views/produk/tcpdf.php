<?php

\Yii::$app->get('tcpdf');

// create new PDF document
$pdf = new TCPDF(PDF_PAGE_ORIENTATION, PDF_UNIT, PDF_PAGE_FORMAT, true, 'UTF-8', false);

// set document information
$pdf->SetCreator(PDF_CREATOR);
$pdf->SetAuthor('Bengkel');
$pdf->SetTitle('Bengkel Jaya Auto');
$pdf->SetSubject('Bengkel Jaya Auto');
$pdf->SetKeywords('Bengkel Jaya Auto');

// set header and footer fonts
$pdf->setHeaderFont(Array(PDF_FONT_NAME_MAIN, '', PDF_FONT_SIZE_MAIN));
$pdf->setFooterFont(Array(PDF_FONT_NAME_DATA, '', PDF_FONT_SIZE_DATA));

// set default header data
$pdf->SetHeaderData(PDF_HEADER_LOGO, PDF_HEADER_LOGO_WIDTH, 'Bengkel Jaya Auto', 'Daftar Pelanggan | Bengkel Jaya Auto', array(0,64,255), array(0,64,128));
$pdf->setFooterData(array(0,64,0), array(0,64,128));

// set default monospaced font
$pdf->SetDefaultMonospacedFont(PDF_FONT_MONOSPACED);

// set margins
$pdf->SetMargins(PDF_MARGIN_LEFT, PDF_MARGIN_TOP, PDF_MARGIN_RIGHT);
$pdf->SetHeaderMargin(PDF_MARGIN_HEADER);
$pdf->SetFooterMargin(PDF_MARGIN_FOOTER);
$pdf->SetAutoPageBreak(TRUE, PDF_MARGIN_BOTTOM);
$pdf->setImageScale(PDF_IMAGE_SCALE_RATIO);
$pdf->setFontSubsetting(true);
$pdf->SetFont('dejavusans', '', 11, '', true);


$pdf->AddPage();

// set text shadow effect
// $pdf->setTextShadow(array('enabled'=>true, 'depth_w'=>0.2, 'depth_h'=>0.2, 'color'=>array(196,196,196), 'opacity'=>1, 'blend_mode'=>'Normal'));


$html="<h4>Daftar Pelanggan</h4>";
$pdf->writeHTMLCell(0, 0, '', '', $html, 0, 1, 0, true, '', true);

$tbl = <<<EOD
<table cellspacing="0" cellpadding="1" border="1">
	<tr>
		<th><b>ID</b></th>
		<th><b>Tipe Produk</b></th>
		<th><b>Nama</b></th>
		<th><b>Harga</b></th>
	</tr>
EOD;

foreach ($model as $key => $value) {

$tbl.= <<<EOD
	<tr>
		<th><b>$value->id</b></th>
		<th><b>$value->type_id</b></th>
		<th><b>$value->nama</b></th>
		<th><b>$value->harga</b></th>
	</tr>

EOD;

}

$tbl.= <<<EOD
	</table>
EOD;

$pdf->writeHTML($tbl, true, false, false, false, '');
$pdf->Output('Data_Pelanggan.pdf', 'I');
\Yii::$app->end();

?>