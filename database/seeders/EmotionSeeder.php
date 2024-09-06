<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class EmotionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Insert emotion data with timestamps
        DB::table('emotions')->insert([
        ['name' => 'Happy', 'description' => 'Feeling of joy or pleasure', 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
        ['name' => 'Sad', 'description' => 'Feeling of sorrow or unhappiness', 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
        ['name' => 'Angry', 'description' => 'Feeling of strong displeasure or hostility', 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
        ['name' => 'Excited', 'description' => 'Feeling of enthusiasm and eagerness', 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
        ['name' => 'Anxious', 'description' => 'Feeling of worry, nervousness, or unease', 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
        ]);
    }
}
