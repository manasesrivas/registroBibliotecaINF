<?php

namespace Database\Seeders;

use App\Models\Reader;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ReaderSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Reader::create([
            'id'=>1,
            'name'=>'victor',
            'lastName'=>'moreno',
            'year'=>'1',
            'seccion'=>'A',
            'especialidad'=>'desarrollo de software'
        ]);

    }
}
