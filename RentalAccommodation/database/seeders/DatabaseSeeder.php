<?php

namespace Database\Seeders;

use App\Models\Accommodation;
use App\Models\Picture;
use Illuminate\Database\Seeder;
use App\Models\User;
use App\Models\Comment;
use App\Models\Feature;
use App\Models\Rate;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // με την χρήση του 10 εννοούμε ότι θέλουμε να φτίαξουμε 10 εγγραφές.
        User::factory(10)->create();
        Accommodation::factory(10)->create();
        Comment::factory(10)->create();
        Feature::factory(10)->create();
        Picture::factory(10)->create();
        Rate::factory(10)->create();
        Picture::factory(10)->create();        
    }
}
