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
            $table->string('first_name')->nullable();
            $table->string('last_name')->nullable();
            $table->integer('contact_number')->nullable();
            $table->string('job')->nullable();
            $table->integer('age')->nullable();
            $table->integer('familly_member')->nullable();
            $table->string('email')->nullable();
            $table->string('password')->nullable();
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

            $table->integer('property_id')->nullable();
            $table->integer('unit_id')->nullable();
            $table->string('lease_start_date')->nullable();
            $table->string('lease_end_date')->nullable();
            $table->integer('general_rent')->nullable();
            $table->integer('security_deposit')->nullable();
            $table->integer('late_fee')->nullable();
            $table->integer('incident_recipt')->nullable();
            $table->string('payment_due_on_date')->nullable();
            $table->string('document')->nullable();
            $table->string('image')->nullable();
            $table->integer('tenant_id')->nullable();
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
