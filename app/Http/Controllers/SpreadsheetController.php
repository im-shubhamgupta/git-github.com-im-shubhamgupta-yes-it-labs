<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;
use Illuminate\Support\Facades\Response;
use App\Models\user;
class SpreadsheetController extends Controller
{
    public function export()
    {
        // Create a new Spreadsheet object
        $spreadsheet = new Spreadsheet();
        $sheet = $spreadsheet->getActiveSheet();

        $sheet->setCellValue('A1', 'ID');
        $sheet->setCellValue('B1', 'Name');
        $sheet->setCellValue('C1', 'Email');
        $sheet->setCellValue('D1', 'Mobile');
        $sheet->setCellValue('E1', 'Created At');

        $data = User::select('id', 'name', 'email','mobile', 'created_at')->get();
        $data = $data->toArray();
        $row = 2;
        $row = 2;
        foreach ($data as $record) {
            // Explicitly map the fields to the correct columns
            $sheet->setCellValue("A{$row}", $record['id']);
            $sheet->setCellValue("B{$row}", $record['name']);
            $sheet->setCellValue("C{$row}", $record['email']);
            $sheet->setCellValue("D{$row}", $record['mobile']);
            $sheet->setCellValue("E{$row}", date('Y-m-d',strtotime($record['created_at'])));
            $row++;
        }
        /*$cleanedRecord = [
            'id' => $record['id'],
            'name' => $record['name'],
            'email' => $record['email'],
            'mobile' => $record['mobile'],
            'created_at' => $record['created_at'],
        ];
        $sheet->fromArray($cleanedRecord, null, "A{$row}");*/

        $tempFile = tempnam(sys_get_temp_dir(), 'excel_export');
        $writer = new Xlsx($spreadsheet);
        $writer->save($tempFile);

        return Response::download($tempFile, 'example.xlsx')->deleteFileAfterSend(true);
    }
}
