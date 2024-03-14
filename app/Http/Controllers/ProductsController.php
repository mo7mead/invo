<?php

namespace App\Http\Controllers;

use App\Models\products;
use App\Models\sections;
use Illuminate\Http\Request;

class ProductsController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        $sections = sections::all();
        $products = products::all();
        return view('products.index', compact('sections', 'products'));
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
    public function store(Request $request)
    {
        //
        // start valied data 


        $validatedData = $request->validate(
            [
                'product_name' => 'required|unique:products|max:255',
                'description' => 'required',
            ],
            [
                'product_name.required'  =>  'الرجاء ادخال اسم المنتج ',
                'product_name.unique'  =>  'اسم المنتج متواجد',
                'description.required'  =>  'الرجاء ادخال الوصف',
            ]
        );

        // return "Hello World"; -> status Ok 
        $product_name = request()->product_name;
        $description = request()->description;
        $section_id  = request()->section_id;

        products::create([
            'product_name' => $product_name,
            'description' => $description,
            'section_id' => $section_id,
        ]);


        session()->flash('Add', 'تم الحفظ بنجاح');
        return redirect('/products');
    }

    /**
     * Display the specified resource.
     */
    public function show(products $products)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(products $products)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, products $products)
    {
        $id = sections::where('section_name', $request->section_name)->first()->id;

        $products = products::findOrFail($request->pro_id);
        $products->update([
            'product_name' => $request->product_name,
            'description' => $request->description,
            'section_id' => $id,
        ]);

        session()->flash('edit', 'تم التعديل بنجاح');
        return redirect('/products');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Request $request)
    {
        $products = products::findOrFail($request->pro_id);
        $products->delete();
        session()->flash('delete', 'تم الحذف بنجاح');
        return redirect('/products');
    }
}
 