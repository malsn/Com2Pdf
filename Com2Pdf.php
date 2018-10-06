<?php

/**
 * Created by PhpStorm.
 * User: Sergey Malyshev
 * Date: 06.10.2018
 * Time: 14:59
 */

class Com2Pdf
{
    protected $pdf;

    public function __construct()
    {
        $this->pdf = new FPDF();
    }

    public function SetData()
    {
        $this->pdf->AddPage();
        $this->pdf->SetFont('Arial','B',16);
        $this->pdf->Cell(40,10,'Hello World!');
    }

    protected function Output(){
        $this->pdf->Output();
    }
}