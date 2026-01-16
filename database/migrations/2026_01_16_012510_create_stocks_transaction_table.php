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
        Schema::create('stocks_transaction', function (Blueprint $table) {
            $table->id();
            $table->foreignId('items_id')->references('id')->on('items')->cascadeOnDelete();
            $table->foreignId('warehouse_id')->references('id')->on('warehouse')->cascadeOnDelete();
            $table->foreignId('users_id')->references('id')->on('users')->cascadeOnDelete();
            $table->char('type', 3);
            $table->integer('quantity');
            $table->longText('note');
            $table->date('transaction_date')->useCurrent();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('stocks_transaction');
    }
};
