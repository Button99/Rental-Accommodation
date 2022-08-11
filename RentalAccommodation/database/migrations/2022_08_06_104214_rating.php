<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class Rating extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('rates', function (Blueprint $table) {
            $table->id();
            $table->double('rate');
            $table->double('total_rate');
            $table->integer('count');
            $table->timestamps();

            $table->foreignId('user_id')->constrained('users')
                ->onDelete('cascade')->onUpdate('cascade');

            $table->foreignId('accommodation_id')->constrained('accommodations')
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
        Schema::dropDatabaseIfExists('rates');
    }
}
