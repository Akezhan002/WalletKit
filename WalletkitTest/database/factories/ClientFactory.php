<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Client>
 */
class ClientFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'phone_number' => fake()->realText(20),
            'full_name' => fake()->text(300),
            'accumulated_points' => fake()->numberBetween(0, 100)
        ];
    }
}
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Faker\Factory as Faker;

class ClientSeeder extends Seeder
{
    public function run()
    {
        $faker = Faker::create();

        foreach (range(1, 10) as $index) {
            DB::table('clients')->insert([
                'phone_number' => $faker->phoneNumber,
                'full_name' => $faker->name,
                'accumulated_points' => $faker->numberBetween(0, 100),
            ]);
        }
    }
}
