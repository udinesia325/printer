<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        \App\Models\User::factory(1)->create();
        \App\Models\Printer::create([
            "nama" => "udin",
            "kelas" => "staff",
            "biaya" => 5000,
            "deskripsi" => "makalah",
            "user_id" => 1
        ]);
        /* \App\Models\User::factory()->create([
            
       ]);*/
    }
}
