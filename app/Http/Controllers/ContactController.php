<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\SiteContact;
use App\Models\ContactReason;

class ContactController extends Controller
{
    public function contact (Request $request) {


        
        $contact_reasons = ContactReason::all();   

        return view('site.contact', ['title' => 'Contact', 'contact_reasons' => $contact_reasons]);
    }

    public function save(Request $request) {
        // validate form
        $request->validate([
            'name' => 'required|min:3|max:40',
            'phone' => 'required|numeric',
            'email' => 'required|email:rfc,dns',
            'contact_reasons_id' => 'required',
            'message' => 'required|max:2000'
            ],
            [
                'contact_reasons_id.required' => "The contact reason field is required"

            ]);
        SiteContact()::create($request->all());
        return redirect()->route('site.index');
    }
}
