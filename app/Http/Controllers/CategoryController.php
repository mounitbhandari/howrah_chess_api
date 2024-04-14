<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Http\Requests\StoreCategoryRequest;
use App\Http\Requests\UpdateCategoryRequest;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function get_category()
    {
        $data  = Category::get();
        return response()->json(['success'=>1,'data' => $data], 200);
    }

    public function save_category(Request $request)
    {
        $requestedData = $request->json()->all();
        foreach ($requestedData as $data){
            $category  = new Category();
            $category->type = $data['type'];
            $category->total = $data['total'];
            $category->save();
        }

        return response()->json(['success'=>1], 200);
    }

    public function update_category(Request $request)
    {
        $requestedData = (object)$request->json()->all();
        $category  = Category::find($requestedData->id);
        $category->type = $requestedData->type;
        $category->total = $requestedData->total;
        $category->update();
        return response()->json(['success'=>1,'data' => $category], 200);
    }

    public function delete_category($id)
    {
        $category = Category::find($id);
        $category->delete();
        return response()->json(['success'=>1,'data' => $category], 200);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Category $category)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateCategoryRequest $request, Category $category)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Category $category)
    {
        //
    }
}
