<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePropertiesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('properties', function (Blueprint $table) {
            $table->id('property_id');
            $table->string('name')->nullable();
            $table->string('total_unit')->nullable();
            $table->longText('description')->nullable();
            $table->string('image')->nullable();

            $table->string('country')->nullable();
            $table->string('state')->nullable();
            $table->longText('city')->nullable();
            $table->string('zip_code')->nullable();
            $table->longText('address')->nullable();
            $table->string('map_link')->nullable();
     

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('properties');
    }
}
