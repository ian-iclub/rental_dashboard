<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddTenantRelationshipToTenantMates extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('tenant_mates', function (Blueprint $table) {
            if (!Schema::hasColumn('tenant_mates', 'tenant_id')) {
                $table->unsignedBigInteger('tenant_id');
                $table->foreign('tenant_id')->references('id')->on('tenants')->onDelete('cascade');
            }
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('tenant_mates', function (Blueprint $table) {
            //
        });
    }
}
