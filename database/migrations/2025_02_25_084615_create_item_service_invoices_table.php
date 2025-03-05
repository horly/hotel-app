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
        Schema::create('item_service_invoices', function (Blueprint $table) {
            $table->id();
            $table->string('name', 255);

            $table->bigInteger('id_service')
                    ->unsigned()
                    ->index();
            $table->foreign('id_service')
                    ->references('id')->on('services')
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
        Schema::dropIfExists('item_service_invoices');
    }
};
