<?php

namespace Database\Seeders;

use App\Models\Urun;
use App\Models\UrunDetay;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class UrunTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::statement('SET FOREIGN_KEY_CHECKS = 0');

        Urun::truncate();
        UrunDetay::truncate();
        $urun =  Urun::factory(30)->create();

        for ($i = 0; $i < 30; $i++) {
            $detay = $urun[$i]->detay()->create([
                'goster_slider' => rand(0, 1),
                'goster_gunun_firsati' => rand(0, 1),
                'goster_one_cikan' => rand(0, 1),
                'goster_cok_satan' => rand(0, 1),
                'goster_indirimli' => rand(0, 1),
            ]);
        }

        DB::statement('SET FOREIGN_KEY_CHECKS = 1');
    }
}
