<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
// use Illuminate\Support\Facades\DB;

use App\Models\telephones;

class TelephonesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $telephone = new telephones();
        $telephone->name_telefonia = 'Telcel';
        $telephone->save();

        $telephone = new telephones();
        $telephone->name_telefonia = 'AT&T';
        $telephone->save();

        $telephone = new telephones();
        $telephone->name_telefonia = 'Movistar';
        $telephone->save();

        $telephone = new telephones();
        $telephone->name_telefonia = 'Unefon';
        $telephone->save();

        $telephone = new telephones();
        $telephone->name_telefonia = 'Virgin Mobile';
        $telephone->save();

        $telephone = new telephones();
        $telephone->name_telefonia = 'Freedompop';
        $telephone->save();

        $telephone = new telephones();
        $telephone->name_telefonia = 'Flash Mobile';
        $telephone->save();

        $telephone = new telephones();
        $telephone->name_telefonia = 'Weex';
        $telephone->save();

        $telephone = new telephones();
        $telephone->name_telefonia = 'Cierto';
        $telephone->save();

        $telephone = new telephones();
        $telephone->name_telefonia = 'Maz Tiempo';
        $telephone->save();

        // DB::table('telephones')->insert([
        //     'name_telefonia' => 'Movistar',
        // ]);

        // DB::table('telephones')->insert([
        //     'name_telefonia' => 'Telcel',
        // ]);
    }
}
