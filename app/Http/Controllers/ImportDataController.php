<?php

namespace App\Http\Controllers;

use App\Imports\DataImport;
use App\Models\ImportData;
use App\Http\Requests\StoreImportDataRequest;
use App\Http\Requests\UpdateImportDataRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Maatwebsite\Excel\Facades\Excel;

class ImportDataController extends Controller
{
    public function import_data(Request $request)
    {
        ImportData::truncate();

        Excel::import(new DataImport, $request->file('users'));

//        DB::beginTransaction();
//        try {
//            Excel::import(new DataImport, $request->file('users'));
//        }catch(\Exception $e){
//            DB::rollBack();
//            return response()->json(['success'=>0,'exception'=>$e->getMessage()], 200);
//        }

        return response()->json(['success'=>1,'message' => 'Data Imported'], 200);
    }

    public function number_conversion($data)
    {
//        return $data;
//        $ret_value = 0;
//        $length = strlen($data->point);
//        $getHalf = substr($data->point,$length-2);
//        $whole_number = substr($data->point,0,$length-2);

        $length = strlen($data);
        $getHalf = substr($data,$length-2);
        $whole_number = substr($data,0,$length-2);

        if($getHalf == '½'){
            return (int)$whole_number + 0.5;
        }
        return $data;
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreImportDataRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(ImportData $importData)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(ImportData $importData)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateImportDataRequest $request, ImportData $importData)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(ImportData $importData)
    {
        //
    }
}
