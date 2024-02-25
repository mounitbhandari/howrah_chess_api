<?php

namespace App\Imports;

use App\Models\ImportData;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithStartRow;

class DataImport implements ToModel, WithStartRow
{

    public function startRow(): int
    {
        return 6;
    }
    public function model(array $row)
    {
        return new ImportData([
            'rank' => $row[0],
            'name'=>$row[3],
            'gender'=>$row[4] ? strtoupper($row[4]) : 'M',
            'irtg'=>$row[5],
            'club'=>$row[6],
            'type'=>$row[7],
            'point'=>$row[8],
            'bh1'=>$row[9],
            'bh2'=>$row[10],
            'sb'=>$row[11],
            'res'=>$row[12],
            'vict'=>$row[13],
        ]);
    }

}
