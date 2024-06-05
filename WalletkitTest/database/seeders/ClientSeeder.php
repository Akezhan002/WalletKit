<?php

namespace Database\Seeders;

use Faker\Factory as Faker;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ClientSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run()
    {
        $faker = Faker::create();

        foreach (range(1, 10) as $index) {
            // Удаляем все символы, кроме цифр
            $digits = preg_replace('/[^0-9]/', '', $faker->phoneNumber);

            // Форматируем номер в требуемый формат
            $formattedNumber = preg_replace('/(\d{1})(\d{3})(\d{3})(\d{4})/', '$1-$2-$3-$4', $digits);
            DB::table('clients')->insert([
                'phone_number' => $digits,
                'full_name' => $faker->name,
                'accumulated_points' => $faker->numberBetween(0, 100),
            ]);
        }
    }
}
