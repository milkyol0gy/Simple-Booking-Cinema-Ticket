<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;

class MovieSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('movies')->insert([
            [
                'movie_title' => 'Inside Out',
                'duration' => 95,
                'release_date' => Carbon::parse('2015-08-19'),
                'created_at' => now()
            ],
            [
                'movie_title' => 'The Good Dinosaur',
                'duration' => 93,
                'release_date' => Carbon::parse('2015-11-25'),
                'created_at' => now()
            ],
            [
                'movie_title' => 'Moana',
                'duration' => 107,
                'release_date' => Carbon::parse('2016-11-25'),
                'created_at' => now()
            ],
            [
                'movie_title' => 'Frozen 2',
                'duration' => 103,
                'release_date' => Carbon::parse('2019-11-20'),
                'created_at' => now()
            ],
            [
                'movie_title' => 'Encanto',
                'duration' => 109,
                'release_date' => Carbon::parse('2021-11-24'),
                'created_at' => now()
            ]
        ]);
    }
}
