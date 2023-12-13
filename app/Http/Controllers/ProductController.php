<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = Product::orderBy('id')->get();
        return response()->json([
            'status' => 'success',
            'message' => 'data succcesfully loaded',
            'data' => $data
        ], 200);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $dataProduct = new Product();
        $dataProduct->product_image = $request->product_image;
        $dataProduct->product_name = $request->product_name;
        $dataProduct->product_category = $request->product_category;
        $dataProduct->product_collection = $request->product_collection;
        $dataProduct->product_price = $request->product_price;

        $post = $dataProduct->save();
        return response()->json([
            'status' => true,
            'message' => 'data added successfully',
            'data' => $dataProduct
        ], 200);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $data = Product::find($id);
        if ($data) {
            return response()->json([
                'status' => true,
                'message' => 'data successfully loaded',
                'data' => $data    
            ], 200);
        }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $dataProduct = Product::find($id);
        $dataProduct->product_image = $request->product_image;
        $dataProduct->product_name = $request->product_name;
        $dataProduct->product_category = $request->product_category;
        $dataProduct->product_collection = $request->product_collection;
        $dataProduct->product_price = $request->product_price;

        $post = $dataProduct->save();
        return response()->json([
            'status' => true,
            'message' => 'data updated successfully',
            'data' => $dataProduct
        ], 200);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $dataProduct = Product::find($id);
        if (empty($dataProduct)) {
            return response()->json([
                'status' => false,
                'message' => 'data not found',
            ], 404);
        }

        $post = $dataProduct->delete();

        return response()->json([
            'status' => true,
            'message' => 'data deleted',
        ], 200);
    }
}
