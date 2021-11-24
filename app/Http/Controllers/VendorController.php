<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Vendor;

class VendorController extends Controller
{
    public function index() {
        return view('app.vendor.index');
    }

    public function list(Request $request) {
        $vendors = Vendor::with(['products'])->where('name', 'like', '%'.$request->input('name').'%')
        ->where('site', 'like', '%'.$request->input('site').'%')
        ->where('state', 'like', '%'.$request->input('state').'%')
        ->where('email', 'like', '%'.$request->input('email').'%')
        ->paginate(10);
        return view('app.vendor.list', ['vendors' => $vendors, 'request' => $request->all() ]);
    }

    public function add(Request $request) {
        $msg = '';

        if($request->input('_token') != '' && $request->input('id') == '') {
            $rules = [
                'name' => 'required|min:2|max:40',
                'site' => 'required',
                'state' => 'min:2|max:2',
                'email' => 'email'
            ];

            $request->validate($rules);
            $vendor = new Vendor();
            $vendor->create($request->all());

            $msg = 'Vendor added';
        }

        if($request->input('_token') != '' && $request->input('id') != '') {

            $vendor = Vendor::find($request->input('id'));
            $updated = $vendor->update($request->all());

            if($updated) {
                $msg = 'Vendor Edited';
            } else {
                $msg = 'There was a problem editing the vendor';
            }

            return redirect()->route('app.vendor.edit', ['id' => $request->input('id'),'msg' => $msg]);
        }

        return view('app.vendor.add', ['msg' => $msg]);
    }

    public function edit($id, $msg = '') {
        
        $vendor = Vendor::find($id);
        
        return view('app.vendor.add', ['vendor' => $vendor, 'msg' => $msg]);
    }

    public function delete($id) {

        Vendor::find($id)->delete();

        return redirect()->route('app.vendor');
    }
}
