<?php

namespace Database\Seeders;

use App\Models\Event;
use Carbon\Carbon;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class EventSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
   public function run()
    {
        // Event::create(['name' => 'Music Fest', 'date' => '2025-07-01', 'venue' => 'Delhi Stadium', 'available_seats' => 100, 'created_at' => Carbon::now(),
        //         'updated_at' => Carbon::now(),]);
        Event::create(['name' => 'Jubin Nautiyal Live Concert in Mumbai', 'date' => '2025-08-10', 'venue' => 'Mumbai Expo', 'available_seats' => 80, 'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),]);
        Event::create(['name' => 'Neha Kakkar New Song', 'date' => '2025-08-05', 'venue' => 'Jaipur Hall', 'available_seats' => 50, 'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),]);
    }
}
