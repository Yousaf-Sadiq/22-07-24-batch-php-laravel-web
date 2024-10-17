<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::table('admins', function (Blueprint $table) {

            $table->unsignedBigInteger("address_id")->nullable()->change();


            $table->foreign("address_id")
                ->references("adrs_id")
                ->on("addresses")
                ->nullOnDelete()
                ->noActionOnUpdate();

        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('admins', function (Blueprint $table) {
            $table->dropForeign("address_id");
        });
    }
};
