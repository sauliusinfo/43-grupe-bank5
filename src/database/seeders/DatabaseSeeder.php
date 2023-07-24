<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Faker\Factory as Faker;
use Monolog\Handler\RollbarHandler;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $faker = Faker::create('lt_LT');
        $countryCode = 'LT';

        DB::table('users')->insert(
            [
                'name' => 'sauliusinfo',
                'email' => 'saulius.info@icloud.com',
                'password' => Hash::make('Testas12345'),
                'role' => 100,
            ]
        );
        DB::table('users')->insert(
            [
                'name' => 'user',
                'email' => 'user@gmail.com',
                'password' => Hash::make('User12345'),
                'role' => 1,
            ]
        );

        foreach (range(1, 30) as $_) {
            DB::table('clients')->insert([
                'name' => $faker->firstName,
                'surname' => $faker->lastName,
                'card_id' => $faker->regexify('[34][0-9]{10}')
            ]);
        }

        foreach (range(1, 200) as $_) {
            DB::table('accounts')->insert([
                'account_no' => $faker->iban($countryCode),
                'client_id' => $faker->numberBetween(1, 20)
            ]);
        }
    }
}
