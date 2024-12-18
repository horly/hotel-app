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
        Schema::create('bookings', function (Blueprint $table) {
            $table->id();
            $table->string('reference_reservation', 255);
            $table->timestamp('arrival_date');
            $table->timestamp('departure_date');
            $table->integer('confirmed')->default(0); //0 : pas confirmé, 1 : confirmé, 2: annulé

            $table->bigInteger('id_customer')
                    ->unsigned()
                    ->index();
            $table->foreign('id_customer')
                    ->references('id')->on('customers')
                    ->onDelete('cascade')
                    ->onUpdate('cascade');

            $table->bigInteger('id_room')
                    ->unsigned()
                    ->index();
            $table->foreign('id_room')
                    ->references('id')->on('rooms')
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
        Schema::dropIfExists('bookings');
    }
};
