<?php

namespace App\Utilities\Excel;
use App\Utilities\Container;
use PhpOffice\PhpSpreadsheet\Exception;
use PhpOffice\PhpSpreadsheet\IOFactory;
use PhpOffice\PhpSpreadsheet\Cell\Coordinate;
use PhpOffice\PhpSpreadsheet\Reader\Exception as ReaderException;
use PhpOffice\PhpSpreadsheet\Style\Fill;
use PhpOffice\PhpSpreadsheet\Shared\Date;
use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;
use PhpOffice\PhpSpreadsheet\Style\Border;
use PhpOffice\PhpSpreadsheet\Worksheet\Drawing;
use PhpOffice\PhpSpreadsheet\Writer\Exception as WriterException;

class ExcelReader
{
    public $data;
    public function __construct ( $path, $highestColumnIndex = null ) {
        $inputFileName = $path;
        $objReader = IOFactory::createReader('Xlsx');
        $objReader->setReadDataOnly(true);
        try {
          $objPHPExcel = $objReader->load($inputFileName);
        } catch(\PhpOffice\PhpSpreadsheet\Reader\Exception $e) {
          throw new \Error( __('messages.file-loading-error').$e->getMessage() );
        }
        $objWorksheet = $objPHPExcel->getActiveSheet();
        $highestRow = $objWorksheet->getHighestRow();
        $highestColumn = $objWorksheet->getHighestColumn();
        $highestColumnIndex =  $highestColumnIndex ?: Coordinate::columnIndexFromString($highestColumn);
        $readdata = array();
        for ($row = 1; $row <= $highestRow; ++$row) {
          for ($col = 1; $col <= $highestColumnIndex; ++$col) {
            $readdata[$row][$col] = $objWorksheet->getCellByColumnAndRow($col, $row)->getValue();
          }
        }
        $this->data = [
            'highestRow' => $highestRow,
            'highestColumn' => $highestColumn,
            'highestColumnIndex' => $highestColumnIndex,
            'data' => $readdata,
        ];
    }
}
