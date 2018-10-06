<?php
/**
 * Created by PhpStorm.
 * User: Sergey Malyshev
 * Date: 06.10.2018
 * Time: 16:07
 */
require $_SERVER['DOCUMENT_ROOT'].'/Com2Pdf/Com2Pdf.php';

$pdf_creator = new Com2Pdf();
$pdf_creator->SetData();
$pdf_creator->Output();
unset($pdf_creator);