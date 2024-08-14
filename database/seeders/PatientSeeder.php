<?php

namespace Database\Seeders;

use App\Models\Patient;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class PatientSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // buat 50 patients
        for ($i = 0; $i < 50; $i++) {
            Patient::create([
                // namanya gunakan random
                'name' => fake()->name(),
                'sex' => rand(0, 1) ? 'f' : 'm',
                'birth' => fake()->dateTimeThisCentury(),
                'address' => fake()->address(),
                'phone' => fake()->phoneNumber(),
            ]);
        }
    }
}
