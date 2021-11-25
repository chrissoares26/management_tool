<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Order;
use App\Models\Product;
use App\Models\OrderProduct;
use App\Models\Customer;

class OrderProductController extends Controller
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
    public function create(Order $order)
    {   
        $customer = Customer::first();
        $products = Product::all();
        $order->products;
        return view('app.order_product.create', ['order' => $order, 'customer' => $customer, 'products' => $products]);
        
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, Order $order)
    {
        $rules = [
            'product_id' => 'exists:products,id',
            'quantity' => 'required|integer'
        ];

        $feedback = [
            'product_id.exists' => 'This product does not exist'
        ];

        $request->validate($rules, $feedback);
    

        // $orderProduct = new OrderProduct();
        // $orderProduct->order_id = $order->id;
        // $orderProduct->product_id = $request->get('product_id');
        // $orderProduct->save();

        $order->products()->attach(
            $request->get('product_id'),
            ['quantity' => $request->get('quantity')]
        );

        return redirect()->route('order-product.create', ['order' => $order->id]);
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
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(OrderProduct $orderProduct, $order_id)
    {
        // print_r($order->getAttributes());
        // echo '<hr>';
        // print_r($product->getAttributes());

        // $order->products()->detach($product->id);

        $orderProduct->delete();
        return redirect()->route('order-product.create', ['order' => $order_id]);
    }
}
