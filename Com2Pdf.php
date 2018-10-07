<?php

/**
 * Created by PhpStorm.
 * User: Sergey Malyshev
 * Date: 06.10.2018
 * Time: 14:59
 */
require $_SERVER['DOCUMENT_ROOT'].'/Com2Pdf/lib/fpdf181/fpdf.php';
require $_SERVER['DOCUMENT_ROOT'].'/Com2Pdf/lib/pdf/PDF.php';

class Com2Pdf
{
    protected $pdf;

    public function __construct()
    {
        $this->pdf = new PDF();
    }

    protected function SetData()
    {
        $this->pdf->AddPage();
        $this->pdf->SetFont('Arial','B',16);
        $this->pdf->Cell(40,10,'Hello World!');
    }

    public function Output(){
        $this->pdf->Output();
    }
}