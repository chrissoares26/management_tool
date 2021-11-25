<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Order;
use App\Models\Customer;
use App\Models\Product;

use DB;

class OrderController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        // $customer = DB::table('customers')
        //     ->join('orders', 'customers.id', '=', 'orders.customer_id')
        //     ->select('customers.name')
        //     ->get();

        $customer = Order::with(['customer'])->paginate(10);
      
        $orders = Order::paginate(10);
        return view('app.order.index', ['orders' => $orders, 'customer' => $customer, 'request' => $request->all()]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $customers = Customer::all();
        return view('app.order.create', ['customers' => $customers]);
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
            'customer_id' => 'exists:customers,id'
        ];

        $feedback = [
            'customer_id.exists' => 'This customer does not exist'
        ];

        $request->validate($rules, $feedback);

        $order = new Order();
        $order->customer_id = $request->get('customer_id');
        $order->save();

        return redirect()->route('order.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Order $order)
    {
        $customer = Order::with(['customer'])->paginate(10);
        $products = Product::all();
        $order->products;
       
        return view('app.order.show', ['order' => $order, 'customer' => $customer, 'products' => $products]);
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
    public function destroy($id)
    {
        //
    }
}
