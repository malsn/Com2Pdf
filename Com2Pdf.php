<?php

/**
 * Created by PhpStorm.
 * User: Sergey Malyshev
 * Date: 06.10.2018
 * Time: 14:59
 */
//define('FPDF_FONTPATH', $_SERVER['DOCUMENT_ROOT'].'/Com2Pdf/lib/pdf/fonts/');
require $_SERVER['DOCUMENT_ROOT'].'/Com2Pdf/lib/tfpdf/tfpdf.php';
require $_SERVER['DOCUMENT_ROOT'].'/Com2Pdf/lib/pdf/PDF.php';

class Com2Pdf
{
    protected $pdf;
    private $options;

    public function __construct(array $options = [])
    {
        $this->options = count($options) > 0 ? $options : [
            'date' => date('d.m.Y H:i:s'),
            'com_id' => date('dmYHis'),
            'sender' => 'ООО "Компания-отправитель"',
            'sender_address' => '197000, Санкт-Петербург, Комендантский проспеткт, 31 к1',
            'receiver' => 'ООО "Компания-получатель"',
            'receiver_address' => '100000, Москва, Носовихинское шоссе, 22',
        ];
        $this->pdf = new PDF($this->options);
        $this->SetData();
    }

    protected function SetData()
    {
        $this->pdf->AddPage();
        $this->pdf->AddFont('DejaVu','','DejaVuSans.ttf',true);
        $this->pdf->SetFont('DejaVu','',10);
        $this->pdf->Cell(0,10,"Грузоотправитель: {$this->options['sender']}");
        $this->pdf->Ln(5);
        $this->pdf->Cell(0,10,"Адрес: {$this->options['sender_address']}");
        $this->pdf->Ln(5);
        $this->pdf->Cell(0,10,"Грузополучатель: {$this->options['receiver']}");
        $this->pdf->Ln(5);
        $this->pdf->Cell(0,10,"Адрес: {$this->options['receiver_address']}");
        $this->pdf->Ln(5);
    }

    public function Output(){
        $this->pdf->Output();
    }
}