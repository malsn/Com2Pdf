<?php

/**
 * Created by PhpStorm.
 * User: sergey malyshev
 * Date: 07.10.2018
 * Time: 20:34
 */
class PDF extends FPDF
{
    function Header(){
        $this->AddFont('ArialMT','','adcec164a032d33df8ff744f2aa7e2c3_arial.php');
        // Select Arial bold 15
        $this->SetFont('ArialMT','',10);
        // Move to the right
        $this->Cell(80);
        // Framed title
        $this->Cell(30,10,'Поручение на перевозку груза',0,0,'C');
        // Line break
        $this->Ln(20);
    }
}