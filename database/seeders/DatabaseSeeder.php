<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
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
        DB::table("kelas")->insert([
            ["nama_kelas" => "XA RPL"],
            ["nama_kelas" => "XB RPL"],
            ["nama_kelas" => "X TB"],
            ["nama_kelas" => "XIA RPL"],
            ["nama_kelas" => "XIB RPL"],
            ["nama_kelas" => "XI TB"],
            ["nama_kelas" => "XIIA RPL"],
            ["nama_kelas" => "XIIB RPL"],
            ["nama_kelas" => "XII TB"],
            ["nama_kelas" => "Guru"],
            ["nama_kelas" => "Staff"],
            ["nama_kelas" => "Lainnya"]
        ]);
        /* \App\Models\User::factory()->create([
            
       ]);*/
    }
}
