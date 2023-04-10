<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUnitsTable extends Migration
{
    /* Run the migrations. */
    public function up()
    {
        Schema::create('units', function (Blueprint $table) {
            $table->id('unit_id');
            $table->string('unit_name')->nullable();
            $table->string('bedroom')->nullable();
            $table->string('baths')->nullable();
            $table->string('kitchen')->nullable();
            $table->string('property_id')->required();
            $table->timestamps();
        });
    }

    /* Reverse the migrations. */
    public function down()
    {
        Schema::dropIfExists('units');
    }
}
