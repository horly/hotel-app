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
        Schema::create('item_room_invoices', function (Blueprint $table) {
            $table->id();
            $table->string('room_number', 255);
            $table->string('room_cat_name', 255);
            $table->double('room_price');

            $table->bigInteger('id_room')
                    ->unsigned()
                    ->index();
            $table->foreign('id_room')
                    ->references('id')->on('rooms')
                    ->onDelete('cascade')
                    ->onUpdate('cascade');

            $table->bigInteger('id_invoice')
                    ->unsigned()
                    ->index();
            $table->foreign('id_invoice')
                    ->references('id')->on('invoices')
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
        Schema::dropIfExists('item_room_invoices');
    }
};
