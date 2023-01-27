<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Tsf;

class TsfSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $tsf = new Tsf();
        $tsf->modelo = 'F-4 Phantom';
        $tsf->nacionalidad = 'Estadounidense';
        $tsf->motores = 'General Electronics FE79-GE-2A';
        // $tsf->
    }
}
