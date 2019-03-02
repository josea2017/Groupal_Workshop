<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Category;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;

class CategoryController extends Controller
{
     public function open() 
            {
                $data = "This data is open and can be accessed without the client being authenticated";
                return response()->json(compact('data'),200);

            }

            public function closed() 
            {
                $data = "Only authorized users can see this";
                return response()->json(compact('data'),200);
            }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function show()
    {
        //return view('Category/index', ['categories' => Category::orderBy('id', 'asc')->get()]);
        $data = Category::orderBy('id', 'asc')->get();
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

        $category = new Category([
            'name' =>  $request->get('name'),
            'description' => $request->get('description')
        ]);
        try {
            $category->save();
            return response()->json(($category),200);
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
        $category = \App\Category::find($id);
        $category->name = $request->get('name');
        $category->description = $request->get('description');
        $category->save();
        return response()->json(($category),200); 
        
    }



    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
     public function destroy($id)
    {
        $category = \App\Category::find($id);
        $category->delete();
    	$data = "Successfully deleting";
                return response()->json(compact('data'),200);
    }

}
