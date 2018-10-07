<?php

/**
 * Класс PDF наследует класс библиотеки tFPDF для переопределения метода вывода шапки документа,
 * содержащего Наименование, ID и дату поручения
 */
class PDF extends tFPDF
{
    /**
     * @var array
     * Значения, получаемые из входных параметров
     */
    private $pdf_options;

    /**
     * PDF constructor, переопределяем для того, чтобы присвоить объекту наши кастомные значения шапки поручения
     */
    public function __construct($options)
    {
        $this->pdf_options = is_array($options) ? $options : [
            'date' => date('d.m.Y H:i:s'),
            'com_id' => date('dmYHis'),
        ];
        parent::__construct();
    }

    /**
     * Переопределнный метод вывода шапки поручения
     */
    public function Header()
    {
        $this->AddFont('DejaVu', '', 'DejaVuSans.ttf', true);
        $this->SetFont('DejaVu', '', 14);
        $this->Cell(80);
        $this->Cell(30, 10, 'Поручение на перевозку груза', 0, 0, 'C');
        $this->Ln(10);
        $this->Cell(80);
        $this->Cell(30, 10, "№ {$this->pdf_options['com_id']} от {$this->pdf_options['date']}", 0, 0, 'C');
        $this->Ln(20);
    }
}