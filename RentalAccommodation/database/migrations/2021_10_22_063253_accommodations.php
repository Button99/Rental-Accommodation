<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class Accommodations extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    
    // Με βάση το Διάγραμμα
    public function up()
    {
        Schema::create('accommodations', function(Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->integer('rooms');
            $table->text('description');
            $table->string('town');
            $table->enum('accommodation_type', ['Apartment', 'House', 'Unique space', 'Boutique hotel']);
            $table->string('latitude', 9); // επιτρεπόμενα 6 ψηφία.
            $table->string('longitude', 9); // επιτρεπόμενα 6 ψηφία.
            $table->string('address1');
            $table->string('address2')->nullable();
            $table->float('price');
            $table->timestamps();
        
            // Δημιουργία ξένου κλειδιού.
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
        Schema::dropDatabaseIfExists('accommodations');
    }
}
