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
        $this->pdf = new PDF();
        $this->options = $options;
        $this->SetData();
    }

    protected function SetData()
    {
        $this->pdf->AddPage();
        $this->pdf->AddFont('DejaVu','','DejaVuSans.ttf',true);
        $this->pdf->SetFont('DejaVu','',14);

        $this->pdf->Cell(0,10,"Грузоотправитель: {$this->options['sender']} {$this->options['sender_address']}");
        $this->pdf->Cell(0,10,"Грузополучатель: {$this->options['receiver']} {$this->options['receiver_address']}");
    }

    public function Output(){
        $this->pdf->Output();
    }
}