<?php

require_once __DIR__ . '/vendor/autoload.php';

$mpdf = new \Mpdf\Mpdf([
	'default_font_size' => 16,
	'default_font' => 'sarabun'
]);
$html ='<div><h1>รายงาน!</h1></div>';

$mpdf->SetImportUse();
$mpdf->SetDocTemplate('logoheader.pdf',true);

$mpdf->WriteHTML($html);
$mpdf->Output();