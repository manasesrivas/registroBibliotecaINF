<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Book;


class BookSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Book::create([
            'id'=>1,
            'title'=>'don quijote de la mancha',
            'author'=>'miguel de cervantes',
            'editorial'=>'mi abuela',
            'edition'=>'primer edicion'
        ]);



    }
}
