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
            $table->boolean('pool')->default(0);
            $table->boolean('bbq')->default(0);
            $table->boolean('pool_table')->default(0);
            $table->boolean('wifi')->defautl(0);
            $table->boolean('tv')->default(0);
            $table->boolean('kitchen')->default(0);
            $table->boolean('parking')->default(0);
            $table->boolean('air_conditioning')->default(0);
            $table->boolean('washer')->default(0);
            $table->boolean('fire_extinguisher')->default(0);
            $table->boolean('smoke_alarm')->default(0);
            $table->boolean('hot_tub')->default(0);
            $table->timestamps();
            
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
