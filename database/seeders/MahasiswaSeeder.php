<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class MahasiswaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        // DB::table('mahasiswa')->insert([
        //     'nama' => 'John Doe',
        //     'program_studi' => 'Teknologi Informasi',

        // ]);

        \App\Models\Mahasiswa::factory()->count(10)->create();
    }
}
