<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\Item;
use App\Models\ProductDetail;
use App\Models\Unit;
use App\Models\Vendor;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {

        $products = Item::with(['productDetail', 'vendor'])->paginate(10);

        // foreach($products as $key => $product) {
        //     // print_r($product->getAttributes());
        //     // echo '<br><br>';

        //     $productDetail = ProductDetail::where('product_id', $product->id)->first();

        //     if(isset($productDetail)) {
        //         // print_r($productDetail->getAttributes());

        //         $products[$key]['size'] =  $productDetail->size;
        //         $products[$key]['width'] =  $productDetail->width;
        //         $products[$key]['height'] =  $productDetail->height;
        //     }
        //     // echo '<hr>';
        // }
        return view('app.product.index', ['products' => $products, 'request' => $request->all() ]);
    
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $units = Unit::all();
        $vendors = Vendor::all();
        return view('app.product.create', ['units' => $units, 'vendors' => $vendors]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $rules = [
            'name' => 'required|min:3|max:40',
            'description' => 'min:3|max:2000',
            'weight' => 'required|integer',
            'unit_id' => 'exists:units,id',
            'vendor_id' => 'exists:vendors,id'
        ];

        $feedback = [
            'unit_id.exists' => 'The unit informed does not exist',
            'vendor_id.exists' => 'The vendor informed does not exist'
        ];

        $request->validate($rules, $feedback);
        Item::create($request->all());
        return redirect()->route('product.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function show(Product $product)
    {
        return view('app.product.show', ['product' => $product]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function edit(Product $product)
    {
        $units = Unit::all();
        $vendors = Vendor::all();
        return view('app.product.edit', ['product' => $product, 'units' => $units, 'vendors' => $vendors]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Item $product)
    {

        $rules = [
            'name' => 'required|min:3|max:40',
            'description' => 'min:3|max:2000',
            'weight' => 'required|integer',
            'unit_id' => 'exists:units,id',
            'vendor_id' => 'exists:vendors,id'

        ];

        $feedback = [
            'unit_id.exists' => 'The unit informed does not exist',
            'vendor_id.exists' => 'The vendor informed does not exist'
        ];

        $request->validate($rules, $feedback);
        $product->update($request->all());
        return redirect()->route('product.show', ['product' => $product->id ]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function destroy(Product $product)
    {
        $product->delete();

        return redirect()->route('product.index');
    }
}
