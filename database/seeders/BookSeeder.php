<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Faker\Factory as Faker;

class BookSeeder extends Seeder
{
    public function run()
    {
        $faker = Faker::create();

        // Seed 10 random books
        for ($i = 1; $i <= 10; $i++) {
            DB::table('books')->insert([
                'title' => $faker->sentence,
                'author' => $faker->name,
                'isbn' => $this->generateRandomISBN(),
                'publication_year' => $faker->numberBetween(1997, 2023),
                'publisher' => $faker->name,
                'created_at' => now(),
                'updated_at' => now(),
            ]);
        }
    }

    protected function generateRandomISBN()
    {
        // Generate a random 9-digit number for the ISBN
        $randomNumber = str_pad(rand(0, 999999999), 9, '0', STR_PAD_LEFT);

        // Calculate the ISBN-10 checksum
        $checksum = $this->calculateISBNChecksum($randomNumber);

        // Construct the formatted ISBN
        $isbn = '978-' . $randomNumber . '-' . $checksum;

        return $isbn;
    }

    protected function calculateISBNChecksum($digits)
    {
        $checksum = 0;
        $multiplier = 1;

        for ($i = strlen($digits) - 1; $i >= 0; $i--) {
            $digit = (int) $digits[$i];
            $checksum += $digit * $multiplier;
            $multiplier = 4 - $multiplier;
        }

        return (string) ((10 - ($checksum % 10)) % 10);
    }
}
