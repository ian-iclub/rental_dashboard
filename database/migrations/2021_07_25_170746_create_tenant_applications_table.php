<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTenantApplicationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tenant_applications', function (Blueprint $table) {
            $table->id();

            $table->string('current_location');
            $table->string('duration_stayed');
            $table->boolean('landlord_details')->default(false);
            $table->string('landlord_name')->nullable();
            $table->string('landlord_phone')->nullable();
            $table->string('landlord_address')->nullable();
            $table->longText('moving_reason');
            $table->integer('current_rent');
            $table->string('current_house_type');
            $table->string('apartment_interest');
            $table->string('duration_staying');

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
        Schema::dropIfExists('tenant_applications');
    }
}
