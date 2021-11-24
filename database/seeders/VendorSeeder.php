<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Vendor;

class VendorSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $vendor = new Vendor();
        $vendor->name = 'Vendor 100';
        $vendor->site = 'vendor100.com';
        $vendor->state = 'ID';
        $vendor->email = 'contact@vendor100.com';
        $vendor->save();

        Vendor::create([
            'name' => 'Vendor 200',
            'site' => 'vendor200.com',
            'state' => 'UT',
            'email' => 'contact@vendor200.com'
        ]);

    }
}
