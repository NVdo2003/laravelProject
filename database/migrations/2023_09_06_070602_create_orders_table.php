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
        Schema::create('orders', function (Blueprint $table) {
            $table->id();
            $table->dateTime('OrderDate');
            $table->integer('Status');
            $table->foreignId('admins_id')->constrained('admins');
            $table->foreignId('customers_id')->constrained('customers');
            $table->foreignId('payment_methods_id')->constrained('payment_methods');

        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('orders');
    }
};
