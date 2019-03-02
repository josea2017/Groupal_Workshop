<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Product;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;

class ProductController extends Controller
{
    

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function show()
    {
        //return view('Category/index', ['categories' => Category::orderBy('id', 'asc')->get()]);
        $data = Product::orderBy('id', 'asc')->get();
        return response()->json(compact('data'), 200);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request  $request)
    {

        $product = new Product([
            'name' =>  $request->get('name'),
            'sku' => $request->get('sku'), 
            'decription' => $request->get('decription'), 
            'price' => $request->get('price'), 
            'stock' => $request->get('stock'), 
            'category_id' => $request->get('category_id')
        ]);
        try {
            $product->save();
            return response()->json(($product),200);
        } catch (\Illuminate\Database\QueryException $e) {
            return $e;
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
        $product = \App\Product::find($id);
        $product->name = $request->get('name');
        $product->sku = $request->get('sku');
        $product->decription = $request->get('decription');
        $product->price = $request->get('price');
        $product->stock = $request->get('stock');
        $product->category_id = $request->get('category_id');
        $product->save();
        return response()->json(($product),200); 
        
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
     public function destroy($id)
    {
        $product = \App\Product::find($id);
        $product->delete();
    	$data = "Successfully deleting";
                return response()->json(compact('data'),200);
    }



}
