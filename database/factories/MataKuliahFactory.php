<?php

namespace Database\Factories;

use App\Models\MataKuliah;
use Illuminate\Database\Eloquent\Factories\Factory;

class MataKuliahFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    protected $model = MataKuliah::class;

    public function definition()
    {
        return [
            'kode_mk' => $this->faker->unique()->regexify('[A-Z]{2}[0-9]{4}'),
            'nama_mk' => $this->faker->word,
            'sks' => $this->faker->numberBetween(2, 4),
            'semester' => $this->faker->numberBetween(1, 8),
        ];
    }
}
