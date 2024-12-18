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
        Schema::create('service_assign_reservations', function (Blueprint $table) {
            $table->id();
            $table->string('ref_reservation_assgn', 255);

            $table->bigInteger('id_service')
                    ->unsigned()
                    ->index();

            $table->foreign('id_service')
                    ->references('id')->on('services')
                    ->onDelete('cascade')
                    ->onUpdate('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('service_assign_reservations');
    }
};
