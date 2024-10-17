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
        Schema::create('addresses', function (Blueprint $table) {
            $table->id("adrs_id");
            $table->longText("image");
            $table->string("address");
            $table->bigInteger("phone_no");
            $table->unsignedBigInteger("user_id");

            $table->foreign("user_id")
            ->references("admin_id")
            ->on("admins")
            ->nullOnDelete();



            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('addresses');
    }
};
