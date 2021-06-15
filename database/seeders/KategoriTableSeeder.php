<?php

namespace Database\Seeders;

use App\Models\kategori;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class KategoriTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        kategori::truncate();
        $id = DB::table('kategoris')->insertGetId(['kategori_adi' => 'Elektronik', 'slug' => 'elektronik']);
        DB::table('kategoris')->insert(['kategori_adi' => 'Bilgisayar / Tablet', 'slug' => 'bilgisayar-tablet', 'ust_id' => $id]);
        DB::table('kategoris')->insert(['kategori_adi' => 'Tv ve Ses Sistemleri', 'slug' => 'tv-ses-sistemleri', 'ust_id' => $id]);
        $id = DB::table('kategoris')->insertGetId(['kategori_adi' => 'Kitap', 'slug' => 'kitap']);
        DB::table('kategoris')->insert(['kategori_adi' => 'Edebiyat', 'slug' => 'edebiyat', 'ust_id' => $id]);
        DB::table('kategoris')->insert(['kategori_adi' => 'Çocuk', 'slug' => 'cocuk', 'ust_id' => $id]);
        DB::table('kategoris')->insert(['kategori_adi' => 'Bilgisayar', 'slug' => 'bilgisayar', 'ust_id' => $id]);
        DB::table('kategoris')->insert(['kategori_adi' => 'Sınavlara Hazırlık', 'slug' => 'sinavlara-hazirlik', 'ust_id' => $id]);
        DB::table('kategoris')->insert(['kategori_adi' => 'Dergi', 'slug' => 'dergi']);
        DB::table('kategoris')->insert(['kategori_adi' => 'Kişisel Bakım', 'slug' => 'kisisel-bakim']);
        DB::table('kategoris')->insert(['kategori_adi' => 'Giyim ve Moda', 'slug' => 'giyim-moda']);
        DB::table('kategoris')->insert(['kategori_adi' => 'Anne ve Çocuk', 'slug' => 'anne-cocuk']);

    }
}
