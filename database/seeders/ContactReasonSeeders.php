<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\ContactReason;

class ContactReasonSeeders extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        ContactReason::create(['contact_reason' => 'Questions']);
        ContactReason::create(['contact_reason' => 'Compliment']);
        ContactReason::create(['contact_reason' => 'Complaint']);
    }
}
