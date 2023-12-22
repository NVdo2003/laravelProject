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
        Schema::create('detailed_orders', function (Blueprint $table) {
            $table->foreignId('versions_id')->constrained('versions');
            $table->foreignId('orders_id')->constrained('orders');
            $table->primary(['versions_id', 'orders_id']);
            $table->integer('Amount');
            $table->double('PriceVersion');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('detailed_orders');
    }
};
