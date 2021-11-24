<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\ContactReason;

class MainController extends Controller
{
    public function main() {

        $contact_reasons = ContactReason::all();
        
        return view('site.main', ['title' => 'Home', 'contact_reasons' => $contact_reasons]);
    }
}
