<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Customer;

class CustomerSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $customers = new Customer;
        $customers ->name = "Makabe";
        $customers ->email = "iammkbee@gmail.com";
        $customers ->phone = "087861807041";
        $customers ->address = "Dasanbara";
        $customers ->save();

    }
}
