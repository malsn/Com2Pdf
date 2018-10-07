<?php

/**
 * Created by PhpStorm.
 * User: sergey malyshev
 * Date: 07.10.2018
 * Time: 20:34
 */
class PDF extends tFPDF
{
    function Header(){
        $this->AddFont('DejaVu','','DejaVuSans.ttf',true);
        // Select Arial bold 15
        $this->SetFont('DejaVu','',10);
        // Move to the right
        $this->Cell(80);
        // Framed title
        $this->Cell(30,10,'Поручение на перевозку груза',0,0,'C');
        // Line break
        $this->Ln(20);
    }
}