<?php

namespace App\Http\Controllers;

use App\Models\Unit;
use App\Models\ProductDetail;
use App\Models\ItemDetail;
use Illuminate\Http\Request;

class ProductDetailController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $units = Unit::all();
        return view('app.product_detail.create', ['units' => $units]);
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
            'product_id' => 'required',
            'size' => 'required|integer',
            'width' => 'required|integer',
            'height' => 'required|integer',
            'unit_id' => 'exists:units,id'
        ];

        $feedback = [
            'unit_id.exists' => 'The unit informed does not exist'
        ];

        $request->validate($rules, $feedback);
        ProductDetail::create($request->all());
        echo 'Success';
        // return redirect()->route('product.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  App\Models\ProductDetail $productDetail
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $product_detail = ItemDetail::find($id);
        $units = Unit::all();
        return view('app.product_detail.edit', ['product_detail' => $product_detail, 'units' => $units]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  App\Models\ProductDetail $productDetail
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, ProductDetail $product_detail)
    {
        $product_detail->update($request->all());

        echo 'update done';
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
