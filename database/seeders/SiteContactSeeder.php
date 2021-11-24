<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\SiteContact;

class SiteContactSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
    //     $contact = new SiteContact();
    //     $contact->name = 'System';
    //     $contact->phone = '8011111222';
    //     $contact->email = 'contact@sm.com';
    //     $contact->contact_reason = 1;
    //     $contact->message = 'Welcome to the super management';
    //     $contact->save();
    \App\Models\SiteContact::factory()->count(100)->create();
    }
    
}
