<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('customers', function (Blueprint $table) {
            $table->id();
            $table->integer('reference_number');
            $table->string('reference_cust', 255);
            $table->string('firtName', 255);
            $table->string('lastName', 255);
            $table->text('address')->nullable();
            $table->string('phoneNumber', 50);
            $table->string('emailAddr', 255);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('customers');
    }
};
