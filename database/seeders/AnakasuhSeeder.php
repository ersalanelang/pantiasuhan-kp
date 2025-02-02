<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\facades\DB;

class AnakasuhSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('anak__asuhs')->insert([
            'nama' => 'Ersalan Elang',
            // 'foto' => '1',
            'tempat_lahir' => 'Cilegon',
            'tanggal_lahir' => '2000-7-21',
            'usia' => '22',
            'JenisKelamin' => 'Laki-laki',
            'pendidikan' => '4',
            'status' => '1',
            'NamaWali' => 'Purwanto',
            'StatusWali' => 'Ayah',
            'AlamatWali' => 'Jl. Gebang 21, Cilegug, Cilgon, Banten',
        ]);
    }
}
