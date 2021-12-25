<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class Bookings extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('bookings', function(Blueprint $table) {
            $table->id();
            $table->boolean('is_available')->default(0);
            $table->integer('persons');
            $table->date('start_date');
            $table->date('end_date');
            $table->timestamps();
            
            $table->foreignId('accommodation_id')->constrained('accommodations')
                ->onDelete('cascade')->onUpdate('cascade');

            $table->foreignId('user_id')->constrained('users')
                ->onDelete('cascade')->onUpdate('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('bookings');
    }
}
