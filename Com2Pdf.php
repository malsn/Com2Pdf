<?php

/**
 * Подключаем внешнюю библиотеку tFPDF для построения и вывода данных в PDF,
 * а также кастомный наследованный класс.
 */
require './lib/tfpdf/tfpdf.php';
require './lib/pdf/PDF.php';

/**
 * Class Com2Pdf - класс нашего приложения, принимающий входные данные и выводящий данные в PDF
 */

class Com2Pdf
{
    // переменная, содержащая экземпляр библиотеки tFPDF
    private $pdf;
    // переменная, содержащая входные данные приложения
    private $options;

    public function __construct($options)
    {
        // Если на вход подается тип-массив, то он используется для заполнения печатного бланка.
        // В противном случае используются значения по умолчанию
        $this->options = is_array($options) ? $options : [
            'date' => date('d.m.Y H:i:s'),
            'com_id' => date('dmYHis'),
            'sender' => 'ООО "Компания-отправитель"',
            'sender_address' => '197000, Санкт-Петербург, Комендантский проспект, 31 к1',
            'receiver' => 'ООО "Компания-получатель"',
            'receiver_address' => '100000, Москва, Носовихинское шоссе, 22',
        ];
        // Создаем объект PDF-документа с передачей входных параметров
        $this->pdf = new PDF($this->options);
        //Устанавливаем значения документа
        $this->SetData();
    }

    protected function SetData()
    {
        // Создаем страницу
        $this->pdf->AddPage();
        // Подключаем шрифты кириллические
        $this->pdf->AddFont('DejaVu', '', 'DejaVuSans.ttf', true);
        $this->pdf->AddFont('DejaVu', 'B', 'DejaVuSans-Bold.ttf', true);
        $this->pdf->SetFont('DejaVu', 'B', 10);
        $this->pdf->Cell(50, 10, 'Грузоотправитель:');
        $this->pdf->Cell(20, 10);
        $this->pdf->SetFont('DejaVu', '', 10);
        $this->pdf->Cell(0, 10, $this->options['sender']);
        $this->pdf->Ln(5);
        $this->pdf->SetFont('DejaVu', 'B', 10);
        $this->pdf->Cell(50, 10, 'Адрес:');
        $this->pdf->Cell(20, 10);
        $this->pdf->SetFont('DejaVu', '', 10);
        $this->pdf->Cell(0, 10, $this->options['sender_address']);
        $this->pdf->Ln(15);
        $this->pdf->SetFont('DejaVu', 'B', 10);
        $this->pdf->Cell(50, 10, 'Грузополучатель:');
        $this->pdf->Cell(20, 10);
        $this->pdf->SetFont('DejaVu', '', 10);
        $this->pdf->Cell(0, 10, $this->options['receiver']);
        $this->pdf->Ln(5);
        $this->pdf->SetFont('DejaVu', 'B', 10);
        $this->pdf->Cell(50, 10, 'Адрес:');
        $this->pdf->Cell(20, 10);
        $this->pdf->SetFont('DejaVu', '', 10);
        $this->pdf->Cell(0, 10, $this->options['receiver_address']);
        $this->pdf->Ln(15);
    }

    public function Output()
    {
        // выводим результат в браузер ( по умолчанию )
        $this->pdf->Output();
    }
}