<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Faker\Factory as Faker;
use App\Models\Kategori;

class KategoriSeeder extends Seeder
{
    public function run(): void
    {
        Kategori::truncate();
        $faker = Faker::create('id_ID');

        for ($i = 0; $i < 5; $i++) {
            Kategori::create([
                'nama_kategori' => $faker->sentence(2),
                'slug' => $faker->slug(),
                'deskripsi' => $faker->paragraph(3),
            ]);
        }
    }
}
