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

        DB::beginTransaction();
        try {
            Excel::import(new DataImport(), $request->file('users'));
        }catch(\Exception $e){
            DB::rollBack();
            return response()->json(['success'=>0,'exception'=>$e->getMessage()], 200);
        }

        return response()->json(['success'=>1,'message' => 'Data Imported'], 200);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
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
