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
        Schema::create('encaissements', function (Blueprint $table) {
            $table->id();
            $table->string('description', 255);
            $table->string('reference_enc', 255);
            $table->double('amount');

            $table->bigInteger('id_pay_meth')->unsigned()->index();
            $table->foreign('id_pay_meth')
                    ->references('id')->on('payment_methods')
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
        Schema::dropIfExists('encaissements');
    }
};
