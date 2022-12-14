<?php

namespace Database\Factories;

use App\Models\Mahasiswa;
use Illuminate\Database\Eloquent\Factories\Factory;

class MahasiswaFactory extends Factory
{
  protected $model = Mahasiswa::class;
  /**
    * Define the model's default state.
    *
    * @return array
    */
  public function definition()
  {
    return [
      'user_id' => $this->faker->unique()->numberBetween(1, 20),
      'nim' => $this->faker->unique()->regexify('[0-9]{10}'),
      'nama' => $this->faker->name,
      'jenis_kelamin' => $this->faker->randomElement(['Laki-laki', 'Perempuan']),
      'alamat' => $this->faker->address,
      'tanggal_lahir' => $this->faker->date(),
    ];
  }
}
