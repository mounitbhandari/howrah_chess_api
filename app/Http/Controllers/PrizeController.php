<?php

namespace App\Http\Controllers;

use App\Models\Prize;
use App\Http\Requests\StorePrizeRequest;
use App\Http\Requests\UpdatePrizeRequest;
use Illuminate\Http\Request;

class PrizeController extends Controller
{
    public function get_prize()
    {
        $prize = Prize::get();
        return response()->json(['success'=>1,'data' => $prize], 200);
    }

    public function save_prize(Request $request)
    {
        $requestedData = $request->json()->all();
        foreach ($requestedData as $data){
            $prize  = new Prize();
            $prize->type = $data['type'];
            $prize->prize = $data['prize'];
            $prize->save();
        }
        return response()->json(['success'=>1], 200);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StorePrizeRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(Prize $prize)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Prize $prize)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdatePrizeRequest $request, Prize $prize)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Prize $prize)
    {
        //
    }
}
