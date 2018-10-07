<?php

/**
 * Created by PhpStorm.
 * User: Sergey Malyshev
 * Date: 06.10.2018
 * Time: 14:59
 */
define('FPDF_FONTPATH', $_SERVER['DOCUMENT_ROOT'].'/Com2Pdf/lib/pdf/fonts/');
require $_SERVER['DOCUMENT_ROOT'].'/Com2Pdf/lib/fpdf181/fpdf.php';
require $_SERVER['DOCUMENT_ROOT'].'/Com2Pdf/lib/pdf/PDF.php';

class Com2Pdf
{
    protected $pdf;
    private $options;

    public function __construct(array $options = [])
    {
        $this->pdf = new PDF();
        $this->options = $options;
        $this->SetData();
    }

    protected function SetData()
    {
        $this->pdf->AddFont('ArialMT','','arial.php');
        $this->pdf->SetFont('ArialMT','',10);
        $this->pdf->AddPage();
        $this->pdf->Cell(0,10,"Грузоотправитель: {$this->options['sender']} {$this->options['sender_address']}");
        $this->pdf->Cell(0,10,"Грузополучатель: {$this->options['receiver']} {$this->options['receiver_address']}");
    }

    public function Output(){
        $this->pdf->Output();
    }
}