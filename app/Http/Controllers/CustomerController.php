<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Customer;

class CustomerController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $customers = Customer::paginate(10);
        return view('app.customer.index', ['customers' => $customers, 'request' => $request->all()]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('app.customer.create');
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
            'phone' => 'required',
            'email' => 'required|email:rfc,dns',
            'address' => 'required',
            'city' => 'required|min:2|max:20',
            'state' => 'required|min:2|max:2',
            'zip' => 'required',
            'country' => 'required|min:2|max:20'


        ];

        $request->validate($rules);

        $customer = new Customer();
        $customer->name = $request->get('name');
        $customer->phone = $request->get('phone');
        $customer->email = $request->get('email');
        $customer->address = $request->get('address');
        $customer->city = $request->get('city');
        $customer->state = $request->get('state');
        $customer->zip = $request->get('zip');
        $customer->country = $request->get('country');
        $customer->save();

        return redirect()->route('customer.index');

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Customer $customer)
    {
        return view('app.customer.show', ['customer' => $customer]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Customer $customer)
    {
        return view('app.customer.edit', ['customer' => $customer]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Customer $customer)
    {
        $rules = [
            'name' => 'required|min:3|max:40',
            'phone' => 'required|numeric',
            'email' => 'required|email:rfc,dns',
            'address' => 'required',
            'city' => 'required|min:2|max:20',
            'state' => 'required|min:2|max:2',
            'city' => 'required|min:2|max:20',
            'zip' => 'required',
            'country' => 'required|min:2|max:20'


        ];


        $request->validate($rules);
        $customer->update($request->all());
        return redirect()->route('customer.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Customer $customer)
    {
        $customer->delete();

        return redirect()->route('customer.index');
    }
}
