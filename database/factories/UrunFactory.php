<?php

namespace Database\Factories;

use App\Models\Urun;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

class UrunFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Urun::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        $urun_adi = $this->faker->sentence(2);
        return [
            'urun_adi' => $urun_adi,
            'slug' => Str::slug($urun_adi),
            'aciklama'=>$this->faker->sentence(20),
            'fiyati' => $this->faker->randomFloat(3,1,20)
        ];
    }
}
