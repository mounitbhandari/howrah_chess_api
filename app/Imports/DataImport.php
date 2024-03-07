<?php

namespace App\Imports;

use App\Models\ImportData;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithStartRow;
use App\Http\Controllers\ImportDataController;

class DataImport implements ToModel, WithStartRow
{

    public function startRow(): int
    {
        return 6;
    }
    public function model(array $row)
    {
        $importDataController = new ImportDataController();
        return new ImportData([
            'rank' => $row[0],
            'name'=>$row[3],
            'gender'=>$row[4] ? strtoupper($row[4]) : 'M',
            'irtg'=>$row[5],
            'club'=>$row[6],
            'type'=>$row[7],
            'point'=>$importDataController->number_conversion($row[8]),
            'bh1'=>$importDataController->number_conversion($row[9]),
            'bh2'=>$importDataController->number_conversion($row[10]),
            'sb'=>$importDataController->number_conversion($row[11]),
            'res'=>$importDataController->number_conversion($row[12]),
            'vict'=>$importDataController->number_conversion($row[13]),
        ]);
    }

}
