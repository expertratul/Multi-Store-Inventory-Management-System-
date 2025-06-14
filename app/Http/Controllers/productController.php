<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;

class productController extends Controller {
    public function productPage() {
        return view('pages.dashboard.product-page');
    }

    /**
     * product Created a new resource.
     */
    public function productCreate(Request $request) {
        $user_id = $request->header('user_id');

        // Prepare File Name & Path
        $img = $request->file('img');

        $t = time();
        $file_name = $img->getClientOriginalName();
        $img_name = "{$user_id}-{$t}-{$file_name}";
        $img_url = "storage/uploads/{$img_name}";

        // Upload File
        $img->move(public_path('storage/uploads'), $img_name);

        // Save To show Database
        return Product::create([
            'name'          => $request->input('name'),
            'price'         => $request->input('price'),
            'unit'          => $request->input('unit'),
            'img_url'       => $img_url,
            'categories_id' => $request->input('categories_id'),
            'user_id'       => $user_id,
        ]);
    }

    /**
     * product Listing a new resource.
     */
    public function productList(Request $request) {
        $user_id = $request->header('user_id');
        return Product::where('user_id', $user_id)->get();
    }

    /**
     * product By ID a new resource.
     */
    public function productById(Request $request) {
        $user_id = $request->header('user_id');
        $product_id = $request->input('id');
        return Product::where('id', $product_id)->where('user_id', $user_id)->first();
    }

    /**
     * product update a new resource.
     */
    public function productUpdate(Request $request) {
        $user_id = $request->header('user_id');
        $product_id = $request->input('id');

        if ($request->hasFile('img')) {

            // Upload New File
            $img = $request->file('img');
            $t = time();
            $file_name = $img->getClientOriginalName();
            $img_name = "{$user_id}-{$t}-{$file_name}";
            $img_url = "storage/uploads/{$img_name}";
            $img->move(public_path('storage/uploads'), $img_name);

            // Delete Old File
            $filePath = $request->input('file_path');
            File::delete($filePath);

            // Update Product

            return Product::where('id', $product_id)->where('user_id', $user_id)->update([
                'name'          => $request->input('name'),
                'price'         => $request->input('price'),
                'unit'          => $request->input('unit'),
                'img_url'       => $img_url,
                'categories_id' => $request->input('categories_id'),
            ]);

        } else {
            return Product::where('id', $product_id)->where('user_id', $user_id)->update([
                'name'          => $request->input('name'),
                'price'         => $request->input('price'),
                'unit'          => $request->input('unit'),
                'categories_id' => $request->input('categories_id'),
            ]);
        }
    }

    /**
     * product delete a new resource.
     */
    public function productDelete(Request $request) {
        $user_id = $request->header('user_id');
        $product_id = $request->input('id');
        $filePath = $request->input('file_path');
        File::delete($filePath);
        return Product::where('id', $product_id)->where('user_id', $user_id)->delete();
    }
}
