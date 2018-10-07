<?php

/**
 * Created by PhpStorm.
 * User: Sergey Malyshev
 * Date: 06.10.2018
 * Time: 14:59
 */
require './lib/tfpdf/tfpdf.php';
require './lib/pdf/PDF.php';

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
        $this->pdf->AddFont('DejaVu','B','DejaVuSans-Bold.ttf',true);
        $this->pdf->SetFont('DejaVu','B',10);
        $this->pdf->Cell(80,10,"Грузоотправитель:");
        $this->pdf->Cell(20,10);
        $this->pdf->SetFont('DejaVu','',10);
        $this->pdf->Cell(0,10,$this->options['sender']);
        $this->pdf->Ln(5);
        $this->pdf->SetFont('DejaVu','B',10);
        $this->pdf->Cell(80,10,"Адрес:");
        $this->pdf->Cell(20,10);
        $this->pdf->SetFont('DejaVu','',10);
        $this->pdf->Cell(0,10,$this->options['sender_address']);
        $this->pdf->Ln(15);

        $this->pdf->Cell(80,10,"Грузополучатель:");
        $this->pdf->Cell(20,10);
        $this->pdf->SetFont('DejaVu','',10);
        $this->pdf->Cell(0,10,$this->options['receiver']);
        $this->pdf->Ln(5);
        $this->pdf->SetFont('DejaVu','B',10);
        $this->pdf->Cell(80,10,"Адрес:");
        $this->pdf->Cell(20,10);
        $this->pdf->SetFont('DejaVu','',10);
        $this->pdf->Cell(0,10,$this->options['receiver_address']);
        $this->pdf->Ln(15);
    }

    public function Output(){
        $this->pdf->Output();
    }
}