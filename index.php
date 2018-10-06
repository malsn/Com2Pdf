<?php
/**
 * Created by PhpStorm.
 * User: Sergey Malyshev
 * Date: 06.10.2018
 * Time: 16:07
 */
require 'Com2Pdf.php';

$pdf_creator = new Com2Pdf();
$pdf_creator->SetData();
$pdf_creator->Output();
unset($pdf_creator);