<?php

namespace Database\Seeders;

use App\Models\Accommodation;
use App\Models\Picture;
use Illuminate\Database\Seeder;
use App\Models\User;
use App\Models\Booking;
use App\Models\Feature;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        User::factory(10)->create();
        Accommodation::factory(10)->create();
        Picture::factory(10)->create();
        Booking::factory(10)->create();
        Feature::factory(10)->create();
    }
}
