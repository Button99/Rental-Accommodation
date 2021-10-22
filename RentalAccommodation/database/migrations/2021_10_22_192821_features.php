<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class Features extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('features', function(Blueprint $table) {
            $table->id();
            $table->boolean('pool');
            $table->boolean('bbq');
            $table->boolean('pool_table');
            $table->boolean('tv');
            $table->boolean('kitchen');
            $table->boolean('parking');
            $table->boolean('air_conditionings');
            $table->boolean('washer');
            $table->boolean('fire_extinguisher');
            $table->boolean('smoke_alarm');
     
            $table->foreignId('accommodation_id')->constrained('accommodations')
                ->onDelete('restrict')->onUpdate('restrict');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropDatabaseIfExists('features');
    }
}
