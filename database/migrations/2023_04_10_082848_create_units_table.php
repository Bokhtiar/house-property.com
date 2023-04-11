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
            $table->string('bedroom')->default(0);
            $table->string('baths')->default(0);
            $table->string('kitchen')->default(0);

            $table->string('general_rent')->default(0);
            $table->string('security_deposit')->default(0);
            $table->string('late_fee')->default(0);
            $table->string('incident_receipt')->default(0);
            $table->string('rent_type')->default('monthly');

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
