<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;

class categoryController extends Controller {

    public function categoryPage() {
        return view('pages.dashboard.category-page');
    }

    /**
     * Display a listing of the resource.
     */
    public function categoryList(Request $request) {

        $user_id = $request->header('user_id');
        return Category::where('user_id', $user_id)->get();
    }

    /**
     * Show the form for creating a new resource.
     */
    public function createCategory(Request $request) {

        //validate Name
        $request->validate([
            'name' => 'required|string|unique:categories,name',
        ]);

        Category::create([
            // Get user_id from headers
            'user_id' => $request->header('user_id'),
            'name'    => $request->name,
        ]);

        return response()->json([
            'status'  => 'success',
            'message' => 'Category created successfully',
        ], 200);
    }

    /**
     * categoryByID a newly created resource.
     */
    public function categoryByID(Request $request) {
        $category_id = $request->input('id');
        $user_id = $request->header('user_id');
        return Category::where('id', $category_id)->where('user_id', $user_id)->first();

    }

    /**
     * Update the specified resource in storage.
     */
    public function categoryUpdate(Request $request) {

        $category_id = $request->input('id');
        $user_id = $request->header('user_id');

        return Category::where('id', $category_id)->where('user_id', $user_id)->update([
            'name' => $request->input('name'),
        ]);

    }

    /**
     * Remove the specified resource from storage.
     */
    public function categoryDestroy(Request $request) {

        $category_id = $request->input('id');
        $user_id = $request->header('user_id');

        return Category::where('id', $category_id)->where('user_id', $user_id)->delete();
    }
}
