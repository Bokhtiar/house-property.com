<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTenantsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tenants', function (Blueprint $table) {
            $table->id('tenant_id');
            $table->string('first_name')->required();
            $table->string('last_name')->required();
            $table->integer('contact_number')->required();
            $table->string('job')->nullable();
            $table->integer('age');
            $table->integer('familly_member')->required();
            $table->string('email')->required();
            $table->string('password')->required();
            $table->string('p_address')->nullable();
            $table->string('p_country')->nullable();
            $table->string('p_state')->nullable();
            $table->string('p_city')->nullable();
            $table->string('p_zip_code')->nullable();

            $table->string('present_address')->nullable();
            $table->string('present_country')->nullable();
            $table->string('present_state')->nullable();
            $table->string('present_city')->nullable();
            $table->string('present_zip_code')->nullable();

            $table->integer('property_id')->required();
            $table->integer('unit_id')->required();
            $table->string('lease_start_date')->required();
            $table->string('lease_end_date')->required();
            $table->integer('general_rent')->required();
            $table->integer('security_deposit')->nullable();
            $table->integer('late_fee')->nullable();
            $table->integer('incident_recipt')->nullable();
            $table->string('payment_due_on_date')->nullable();
            $table->string('document')->required();
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
        Schema::dropIfExists('tenants');
    }
}
