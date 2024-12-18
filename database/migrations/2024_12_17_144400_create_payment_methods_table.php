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
        Schema::create('payment_methods', function (Blueprint $table) {
            $table->id();
            $table->string('designation', 255);
            $table->integer('default')->default(0);
            $table->string('institution_name', 255)->nullable()->default("-");
            $table->string('iban', 255)->nullable()->default("-");
            $table->string('account_number', 255)->nullable()->default("-");
            $table->string('bic_swiff', 255)->nullable()->default("-");

            $table->bigInteger('id_currency')->unsigned()->index();
            $table->foreign('id_currency')
                    ->references('id')->on('devise_gestions')
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
        Schema::dropIfExists('payment_methods');
    }
};
