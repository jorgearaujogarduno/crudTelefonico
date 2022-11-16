<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\telephone_customer;

class TelephoneCustomersSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $telephone_customer = new telephone_customer();
        $telephone_customer->telephone_id = 2;
        $telephone_customer->name = 'Juan';
        $telephone_customer->ap_paterno = 'López';
        $telephone_customer->ap_materno = 'Pérez';
        $telephone_customer->numero_telefonico = 5512345678;

        $telephone_customer->save();

        $telephone_customer = new telephone_customer();
        $telephone_customer->telephone_id = 3;
        $telephone_customer->name = 'Carlos';
        $telephone_customer->ap_paterno = 'Ortiz';
        $telephone_customer->ap_materno = 'Martínez';
        $telephone_customer->numero_telefonico = 5512345678;

        $telephone_customer->save();
    }
}
