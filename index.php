<?php
/**
 * Created by PhpStorm.
 * User: Sergey Malyshev
 * Date: 06.10.2018
 * Time: 16:07
 */
require $_SERVER['DOCUMENT_ROOT'].'/Com2Pdf/Com2Pdf.php';

$options=[
    'date' => date('d.m.Y H:i:s'),
    'com_id' => date('dmYHis'),
    'sender' => 'ООО "Компания-отправитель"',
    'sender_address' => 'Санкт-Петербург, Комендантский проспеткт, 31 к1',
    'receiver' => 'ООО "Компания-получатель"',
    'receiver_address' => 'Москва, Носовихинское шоссе, 22',
];

$pdf_creator = new Com2Pdf($options);
$pdf_creator->Output();
unset($pdf_creator);