<?php

/**
 * Created by PhpStorm.
 * User: sergey malyshev
 * Date: 07.10.2018
 * Time: 20:34
 */
class PDF extends tFPDF
{
    /**
     * @var array
     */
    private $pdf_options;

    /**
     * PDF constructor.
     */
    public function __construct(array $options = [])
    {
        $this->pdf_options = $options;
        parent::__construct();
    }

    /**
     *
     */
    function Header(){
        $this->AddFont('DejaVu','','DejaVuSans.ttf',true);
        // Select Arial bold 15
        $this->SetFont('DejaVu','',14);
        // Move to the right
        $this->Cell(80);
        // Framed title
        $this->Cell(30,10,'Поручение на перевозку груза',0,0,'C');
        // Line break
        $this->Ln(20);
        $this->Cell(30,10,"№ {$this->pdf_options['com_id']} от {$this->pdf_options['date']}",0,0,'C');
        // Line break
        $this->Ln(20);
    }
}